<?php
    $text = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
    $array = explode(" ", $text);

    function removePunctuation($word) {
        $word_arr = str_split($word);
        for ($i = 0; $i < sizeof($word_arr); $i++) {
            if ($word_arr[$i] == "," || $word_arr[$i] == "." || $word_arr[$i] == "'") {
                removeAtIndex($word_arr, $i);
            }
        }
        return implode($word_arr);
    }

    function removeAtIndex(&$array, $index) {
        for ($i = $index; $i < sizeof($array) - 1; $i++) {
            $array[$i] = $array[$i + 1];
        }
        array_pop($array);
    }

    for ($i = 0; $i < sizeof($array); $i++) {               
        if ($i % 2 != 0) {
            continue;
        }
        $key = removePunctuation($array[$i]);
        if ($i + 1 >= sizeof($array)) {
            $value = "";
        } else {
            $value = removePunctuation($array[$i + 1]);
        }
        $assc_arr[$key] = $value;
    }

    foreach ($assc_arr as $key => $value) {
        printf("%s => %s<br>", $key, $value);
    }
?>