<?php
    class Calendar
    {
        private $active_year, $active_month, $active_day;
        private $events = [];

        public function __construct($date = null)
        {
            $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
            $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
            $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');
        }

        public function add_event($txt, $date, $days = 1, $color = '')
        {
            $color = $color ? ' ' . $color : $color;
            $this->events[] = [$txt, $date, $days, $color];
        }

        private function french_month($moisEnglais)
        {
            $mois = ['January' => 'Janvier', 'February' => 'Fevrier', 'March'  => 'Mars', 'April' => 'Avril', 'May' => 'Mai', 'June' => 'Juin', 'July' => 'Juillet', 'August' => 'Aout', 'September' => 'Septembre', 'October' => 'Octobre', 'November' => 'Novembre', 'December' => 'Decembre'];
            return $mois[$moisEnglais];
        }

        public function __toString()
        {
            $session = session();

            $itostring =[1 => '01',2 => '02',3 => '03',4 => '04',5 => '05',6 => '06',7 => '07',8 => '08',9 => '09',10 => '10',11 => '11',12 => '12',13 => '13',14 => '14',15 => '15',16 => '16',17 => '17',18 => '18',19 => '19',20 => '20',21 => '21',22 => '22',23 => '23',24 => '24',25 => '25',26 => '26',27 => '27',28 => '28',29 => '29',30 => '30',31 => '31'];
            $ladate = new DateTime($this->active_day . '-' . $this->active_month . '-' . $this->active_year);
            $num_days = date('t', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year));
            $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year)));
            $days = [1 => 'Lundi', 2 => 'Mardi', 3 => 'Mercredi', 4 => 'Jeudi', 5 => 'Vendredi', 6 => 'Samedi', 7 => 'Dimanche'];
            $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), [0 => 'Mon', 1 => 'Tue', 2 => 'Wed', 3 => 'Thu', 4 => 'Fri', 5 => 'Sat', 6 => 'Sun']);
            $html = '<div class="nav-space calendar">';
            $html .= '<div class="nav-space d-flex justify-content-evenly">';
            $html .= '<div>';
            $html .= anchor('../Planning/'.$ladate->modify('-1 month')->format('Y-m'), '<svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="currentColor" class="bi bi-chevron-left orange" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/></svg>');
            $html .= '</div>';
            $html .= '<div class="header mx-auto">';
            $html .= '<h3 class="align-self-center dark-text">';
            $html .= $this->french_month(date('F', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day))).' '.$this->active_year;
            $html .= '</h3>';
            $html .= '</div>';
            $html .= '<div>';
            $html .= anchor('../Planning/'.$ladate->modify('+2 month')->format('Y-m'), '<svg xmlns="http://www.w3.org/2000/svg" width="58" height="58" fill="currentColor" class="bi bi-chevron-right orange" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/> </svg>');
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="w-75 mx-auto pt-5">';
            $html .= '<div class="days">';
            foreach ($days as $day)
            {
                $html .= '<div class="day_name">' . $day . '</div>';
            }
            for ($i = $first_day_of_week; $i > 0; $i--)
            {
                $html .= '<div class="day_num ignore">'.($num_days_last_month-$i+1).'</div>';
            }
            for ($i = 1; $i <= $num_days; $i++)
            {
                if ($this->active_year.'-'.$this->active_month.'-'.$itostring[$i] < date('Y-m-d') || (date('l', strtotime($this->active_year.'-'.$this->active_month.'-'.$itostring[$i])) == 'Saturday' || date('l', strtotime($this->active_year.'-'.$this->active_month.'-'.$itostring[$i])) == 'Sunday') || date('F', strtotime($this->active_year.'-'.$this->active_month.'-'.$itostring[$i])) == 'July' || date('F', strtotime($this->active_year.'-'.$this->active_month.'-'.$itostring[$i])) == 'August')
                {
                    $html .= '<div class="day_num ignore">';
                }
                else
                {
                    $html .= '<div class="day_num">';
                }
                $html .= '<span>' . $i . '</span>';
                foreach ($this->events as $event)
                {
                    for ($d = 0; $d <= ($event[2]-1); $d++)
                    {
                        if (date('y-m-d', strtotime($this->active_year.'-'.$this->active_month.'-'.$i.'-'.$d.' day')) == date('y-m-d', strtotime($event[1])))
                        {
                            if ($event[3] == " green")
                            {
                                if (!is_null($session->get('email')))
                                {
                                    $html .= '<a class="link" href="../Reservation/'.$this->active_year.'-'.$this->active_month.'-'.substr($event[1], 8) .'/'.substr($event[0], 0, -8).'">';
                                    $html .= '<div class="event'.$event[3].'">';
                                    $html .= $event[0];
                                    $html .= '</div>';
                                    $html .= '</a>';
                                }
                                else
                                {
                                    $html .= form_open('Planning/'.$this->active_year.'-'.$this->active_month);
                                    $html .= '<div class="event'.$event[3].'">';
                                    $html .= form_submit('btnseance', $event[0], 'class="link btn-ivs"');
                                    $html .= '</div>';
                                    $html .= form_close();
                                }
                            }
                            else
                            {
                                $html .= '<div class="event'.$event[3].'">';
                                $html .= $event[0];
                                $html .= '</div>';
                            }
                        }
                    }
                }
                $html .= '</div>';
            }
            for ($i = 1; $i <= (42-$num_days-max($first_day_of_week, 0)); $i++)
            {
                $html .= '<div class="day_num ignore">'.$i.'</div>';
            }
            $html .= '</div>';
            $html .= '</div>';
            return $html;
        }
    }
?>