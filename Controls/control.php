<?php
    class Control
    {
        private function header($header)
        {
            include(VIEWS."header.php");
        }
        public function page($page)
        {
            if($page == 'voiture')
            {
                $this->header();
                include(VIEWS ."voiture.php");
            }
            elseif($page == 'admin')
            {
                $this->header();
                include(VIEWS ."admin.php");
                include(VIEWS ."voitures.php");
            }
            else //if($page == 'home')
            {
                $this->header();
                // include(VIEWS ."admin.php");
                include(VIEWS ."voitures.php");
            }
        }
        private function footer()
        {
            
        }
    }
?>