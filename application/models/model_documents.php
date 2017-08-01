<?php
class Model_Faq extends Model
{
    public function get_data()
    {
        return array(
          array(
            'question' => 'Question1 ... ?',
            'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua.'
          ),
          array(
            'question' => 'Question2 ... ?',
            'answer' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco
          laboris nisi ut aliquip ex ea commodo consequat.'
          ),
          array(
            'question' => 'Question3 ... ?',
            'answer' => 'Duis aute irure dolor in reprehenderit in voluptate velit
          esse cillum dolore eu fugiat nulla pariatur.'
          )
        );
    }
}