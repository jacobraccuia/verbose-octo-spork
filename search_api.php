<?php

class Search {

    private $search_results;

    function __construct() {
    // if search parameter in URL, lets search
        if(!empty($_GET['search'])) {

            $this->search_results = $this->search($_GET['search']);
        }

    }

    function search($s) {
        if(empty($s)) { return ''; }

        if(!$this->checkIsAValidDate($s)) {
            return '<div class="error">Date is not in valid format</div>';
        }

                        // https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=2015-6-3&api_key=DEMO_KEY
        $ch = curl_init('https://api.nasa.gov/mars-photos/api/v1/rovers/curiosity/photos?earth_date=' . $s . '&api_key=HHurvDsAdqFckh5IH5bqSbtK5Z1KkNXGcAbWRYgb');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        ob_start();

        $results = json_decode($data);
        if(!empty($results) && !empty($results->photos)) {
            foreach($results->photos as $r) {
                ?>
                <div class="photo">
                    <?php if(!empty($r->camera->full_name)) { ?>
                        <strong>Camera: </strong><?php echo $r->camera->full_name; ?><br/>
                    <?php } ?>
                    <?php if(!empty($r->img_src)) { ?>
                        <img src="<?php echo $r->img_src; ?>" />
                    <?php } ?>
                </div>
                <?php
            }
        }

        return ob_get_clean();

    }

    public function get_search_results() {
        if(!empty($this->search_results)) {
            return $this->search_results;
        }
    }

    function checkIsAValidDate($date) {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
            return true;
        } else {
            return false;
        }
    }
}


?>
