<?php
class Model_Main extends Model
{
    public function get_data()
    {
        $res = array(
            'header' => array(
              'title' => 'INNOVATION FÜR <br>JEDES HEIZKONZEPT',
              'slider' => array (
                  array(
                    'img' => 'slider/slider0.png'
                  ),
                  array(
                    'img' => 'slider/slider1.png'
                  ),
                  array(
                    'img' => 'slider/slider2.png'
                  ),
                  array(
                    'img' => 'slider/slider3.jpg'
                  )
                )
            ),
            'property' => array(
              'img' => '',
              'items' => array(
                array(
                  'icon' => '',
                  'title' => 'Экономичность',
                  'description' => 'В стандартных помещениях с высотой потолков менее
            3-х метров, принято использовать 100 Вт
            электричества для обогрева одного м2. Но использование
            ЭКО позволяет снизить расход до 50 Вт с той же
            эффективностью. Это помогает сэкономить до 50 % в
            оплате за тепло.'
                ),
                array(
                  'icon' => '',
                  'title' => 'Практичность и надежность',
                  'description' => 'Панели отопления ЭКО могут использоваться в любых
            непроизводственных помещениях, будь то офис, детская
            комната, ванная или целый дом. Керамическим обогревателям
            не страшны ни пыль, ни влага. А простой монтаж ЭКО займет
            у Вас не больше часа.'
                ),
                array(
                  'icon' => '',
                  'title' => 'Экологичность',
                  'description' => '            Керамические панели отопления не нарушат атмосферу
            Вашего дома, ведь они не сушат воздух и не сжигают
            кислород. А также не выделяют неприятного запаха и
            вредных веществ. Именно поэтому Вы можете использовать
            ЭКО в своем доме без опасений.'
                ),
                array(
                  'icon' => '',
                  'title' => 'Безопасность',
                  'description' => 'Электро-керамические обогреватели изготавливаются
            только из натуральных жаропрочных материалов, которые
            обладают высокой пожаробезопасностью. При производстве
            ЭКО были учтены все требования к прибору для защиты от
            поражения электрическим током.'
                )
              )
            ),
        );

        include 'application/connection.php';


        $query = $mysqli->query("SELECT * FROM gallery_images");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['gallery'][] = $r;
            }
        }

        $query = $mysqli->query("SELECT * FROM gallery_bg");

        if ($query) {
            while ($r = mysqli_fetch_assoc($query)) {
                $res['gallery_bg'] = $r;
            }
        }



        return $res;
    }
}