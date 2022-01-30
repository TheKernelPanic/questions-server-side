<?php
declare(strict_types=1);

namespace QuestionsServerSide\Application\Service\Tag;

use DateTimeImmutable;
use QuestionsServerSide\Application\Helper\SlugHelper;
use QuestionsServerSide\Domain\Tag\Tag;

final class CreateService extends TagService
{
    /**
     * @param Tag $tag
     * @return Tag
     */
    public function __invoke(Tag $tag): Tag
    {
        $slugHelper = new SlugHelper();
        $tag->setSlug(
            slug: $slugHelper->generate(
                text: $tag->getRawText()
            )
        );
        $existing = $this->tagRepository->findOneByCriteria(
            criteria: array(
                'slug' => $tag->getSlug()
            )
        );
        if (!is_null($existing)) {
            return $existing;
        }
        $tag->setCreatedAt(
            createdAt: new DateTimeImmutable
        );
        return $this->tagRepository->save(
            tag: $tag
        );
    }
}