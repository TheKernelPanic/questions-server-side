<?php
declare(strict_types=1);

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Gherkin\Node\PyStringNode;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use function json_decode;

class DefaultContext implements Context
{
    /**
     * @var int
     */
    private int $statusCode;

    /**
     * @var array
     */
    private array $requestHeaders;

    /**
     * @var array
     */
    private array $requestBody;

    /**
     * @var Client
     */
    private Client $httpClient;

    /**
     * @var array|null
     */
    private array|null $response;

    /**
     * @param string $host
     */
    public function __construct(
        private string $host
    )
    {}

    /**
     * @BeforeScenario
     * @param BeforeScenarioScope $event
     */
    public function before(BeforeScenarioScope $event): void
    {
        $this->httpClient = new Client();
        $this->requestBody = [];
        $this->requestHeaders = [];
        $this->response = [];
        $this->statusCode = 0;
    }

    /**
     * @AfterScenario
     * @param AfterScenarioScope $event
     */
    public function after(AfterScenarioScope $event): void
    {

    }

    /**
     * @Given Prepare json payload
     * @param PyStringNode $string
     */
    public function prepareJsonPayload(PyStringNode $string): void
    {
        $this->requestBody = json_decode($string->getRaw(), true);
    }

    /**
     * @When Request :method to :uri
     * @param string $method
     * @param string $uri
     * @throws GuzzleException
     */
    public function requestTo(string $method, string $uri): void
    {
        $options['json'] = $this->requestBody;
        $options['headers'] = $this->requestHeaders;
        $options['allow_redirects'] = false;

        try {
            $response = $this->httpClient->request(
                method: $method,
                uri: "{$this->host}{$uri}",
                options: $options
            );
            $this->statusCode = $response->getStatusCode();

            $responseStreamContent = $response->getBody()->getContents();
            if (strlen($responseStreamContent)) {
                $this->response = json_decode($responseStreamContent, true);
            }
        } catch (ClientException $exception) {
            $this->statusCode = $exception->getResponse()->getStatusCode();
        }
    }

    /**
     * @Then Should respond with :code code
     * @throws Exception
     */
    public function shouldRespondWithCode(int $code): void
    {
        if ($this->statusCode !== $code) {
            throw new Exception(message: "Error response with code -> {$this->statusCode}");
        }
    }
}