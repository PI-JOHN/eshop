<?php


class Pagination
{
    /**
     * @var int cсылок навигации на страницу
     */
    private $max = 10;

    /**
     * @var string ключ для GET, в который пишется номер страницы
     */
    private $index = 'page';

    /**
     * @var Текущая страница
     */
    private $current_page;

    /**
     * @var общее кол-во записей
     */
    private $total;

    /**
     * @var записей на страницу
     */
    private $limit;

    /**
     * Запуск необходимых данных для навигации
     * Pagination constructor.
     * @param $total
     * @param $current_page
     * @param $limit
     * @param $index
     */
    public function __construct($total, $currentPage, $limit, $index)
    {
        # Устанавливаем общее кол-во записей
        $this->total = $total;

        # Устанавливаем кол-во записей на страницу
        $this->limit= $limit;

        # Устанавливаем ключ для URL
        $this->index = $index;

        # Устанавливаем количество страниц
        $this->amount = $this->amount();

        # Устанавливаем кол-во страниц
        $this->setCurrentPage($currentPage);
    }

    /**
     *  для вывода ссылок навигации
     * @return string код для вывода ссылок навигации
     */
    public function get()
    {
        # Для записи ссылок
        $links = null;

        # Получаем ограничения для цикла
        $limits = $this->limits();

        $html = '<ul class="pagination">';

        #Генерируем ссылки
        for ($page = $limits[0]; $page <= $limits[1]; $page++){
            # Если это текущая страница , ссылки нет и добавляется класс active
            if ($page == $this->current_page){
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {
                # Иначе генерируем ссылку
                $links .= $this->generateHtml($page);
            }
        }

        # Если ссылки создались
        if (!is_null($links)){
            # Если текущая страница не первая
            if ($this->current_page > 1)
                # То создаем ссылку на главную
                $links = $this->generateHtml(1, '&lt;') . $links;
                # Если текущая страница не первая
                if ($this->current_page < $this->amount)
                    #Создаем ссылку на последнюю
                    $links .= $this->generateHtml($this->amount, '&gt;');
        }
                $html .= $links . '</ul>';

                #Возвращаем HTML
                return $html;


    }

    /**
     *  для генерации HTML кода ссылки
     * @param $page номер страницы
     * @param null $text
     * @return string
     */
    private function generateHtml($page, $text = null)
    {
        # Если текст ссылки не указан
        if (!$text){
            # Указываем что текст это цифра страницы
            $text = $page;
            $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
            $currentURI = preg_replace('~/page-[0-9]+~', '', $currentURI);
            # Формируем HTML код ссылки и возвращаем
            return '<li><a href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
        }
    }

    /**
     *  Получаем откуда стартовать
     * @return array с началом и концом отсчета
     */
    private function limits()
    {
        # Вычисляем ссылки слева чтобы активная ссылка была посередине
        $left = $this->current_page - round($this->max/2);

        #Вычисляем начало отсчета
        $start = $left > 0 ? $left : 1;

        # Если впереди есть как минимум $this->max страниц
        if ($start + $this->max <= $this->amount)
            # Назначаем конец цикла вперед на $this->max страниц или просто на минимум
            $end = $start > 1 ? $start + $this->max : $this->max;
        else {
            # Конец - общее кол-во страниц
            $end = $this->amount;

            # Начало - минус $this->max от конца
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }
        return array($start, $end);
    }

    /**
     *  Устанавливаем текущую страницу
     * @param $currentPage
     */
    private function setCurrentPage($currentPage)
    {
        #Получаем номер страницы
        $this->current_page = $currentPage;

        #Если текущая страница больше нуля
        if ($this->current_page > 0){
            # Если текущая страница больше общего кол-ва страниц
            if ($this->current_page > $this->amount)
                # Устанавливаем страницу на последнюю
                $this->current_page = $this->amount;
        } else {
            $this->current_page = 1;
        }
    }

    /**
     *  Получение общего числа страниц
     * @return false|float
     */
    private function amount()
    {
        return round($this->total / $this->limit);
    }
}