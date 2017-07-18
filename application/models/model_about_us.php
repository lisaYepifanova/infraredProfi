<?php
class Model_About_us extends Model
{
    public function get_data()
    {
        return array(
            'texts' => array(
            'mission_text' => 'Sed ut perspiciatis unde omnis iste natus error
          sit voluptatem accusantium doloremque laudantium,
          totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
          architecto beatae vitae dicta sunt explicabo.',
            'vision_text' => 'Sed ut perspiciatis unde omnis iste natus error
          sit voluptatem accusantium doloremque laudantium,
          totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
          architecto beatae vitae dicta sunt explicabo.',
            ),
            'images' => array(
              'mission_img' => 'about-us/mission.jpg',
              'vision_img' => 'about-us/vision.jpg'
            ),
            'about_us_description' => array(
              array(
                'paragraph' => 'Sed ut perspiciatis unde omnis iste natus error
          sit voluptatem accusantium doloremque laudantium,
          totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
          architecto beatae vitae dicta sunt explicabo.'
              ),
              array(
                'paragraph' => 'Sed ut perspiciatis unde omnis iste natus error
          sit voluptatem accusantium doloremque laudantium,
          totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
          architecto beatae vitae dicta sunt explicabo.'
              )

            )


        );
    }
}