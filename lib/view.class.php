<?php
class View {

    protected $data;

    protected $path;

    /**
     * @return bool|string
     */
    protected static function getDefaultViewPath(){
        $router = App::getRouter();
        if( !$router ){
            return false;
        }
        $controller_dir = $router->getController();
        $template_name = $router->getMethodPrefix().$router->getAction().'.html';
        return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
    }

    /**
     * View constructor.
     * @param array $data
     * @param null $path
     * @throws Exception
     */
    public function __construct($data = array(), $path = null){
        if( !$path ){
            $path = self::getDefaultViewPath();
        }
        if( !file_exists($path) ){
            throw new Exception('Path'.$path.' not found!');
        }
        $this->data = $data;
        $this->path = $path;
    }

    public function render(){
        $data = $this->data;
        ob_start();
        include($this->path);
        $content = ob_get_clean();

        return $content;
    }
}