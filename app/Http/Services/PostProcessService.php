<?php

namespace App\Http\Services;

use App\Models\Post;
use DOMDocument;
use DOMNodeList;
use DOMDocumentFragment;
use DOMNode;
class PostProcessService
{
     const TagName = 'p';

     protected Post $post;
     protected DOMDocument $processor;

     protected DOMNodeList $paragraphs;

     public function __construct( DOMDocument $processor)
     {
         $this->processor = $processor;
     }

    /**
     * Processing Post
     * @param Post $post
     * @return Post|void
     */
     public function process(Post $post)
     {
         try{
             $this->post = $post;
             $this->processor->loadHTML($this->post->text);
             $this->paragraphs = $this->processor->getElementsByTagName(self::TagName);

             $this->post->text = $this->addBannerAfterFirstElement()
                 ->addBannerBeforeLastElement()
                 ->save();

             return $this->post;
         } catch (\Exception $e) {
            dump($e);
         }
     }

    /**
     * Adding Banner After First Elements
     * @return $this
     */
     public function addBannerAfterFirstElement() :self
     {
         $paragraph = $this->processor->getElementsByTagName(self::TagName)
                                      ->item(0);
         $bannerFragment = $this->renderBanner();
         $this->add($paragraph, $bannerFragment);

         return $this;
     }

    /**
     * Adding banner after last element
     * @return $this
     */
    public function addBannerBeforeLastElement() :self
    {
        $paragraph = $this->processor->getElementsByTagName(self::TagName)
                                     ->item($this->paragraphs->length-1);
        $bannerFragment = $this->renderBanner();
        $this->add($paragraph, $bannerFragment, true);

        return $this;
    }

    /**
     * Rendering random banner connected to post
     * @return DOMDocumentFragment
     */
     protected function renderBanner() :DOMDocumentFragment
     {
         $banner = $this->post->getRandomBanner();

         if($banner)
             $rawBanner = view('banners/banner', ['banner' => $banner])->render();
         else
             $rawBanner = '';

         $fragment = $this->processor->createDocumentFragment();
         $fragment->appendXML($rawBanner);

         return $fragment;
     }

    /**
     * Adding html fragment to post
     * @param DOMNode $paragraph
     * @param DOMDocumentFragment $fragment
     * @param bool $before
     * @return void
     */
     protected function add(DOMNode $paragraph, DOMDocumentFragment $fragment, bool $before = false)
     {
        $direction = $before ? $paragraph :  $paragraph->nextSibling;
        $paragraph->parentNode->insertBefore($fragment, $direction);
     }

    /**
     * Save html for rendering
     * @return string
     */
     protected function save() :string
     {
         return $this->processor->saveHTML();
     }
}
