<?php

class Zend_View_Helper_DisqusThread
{
    public function setView(Zend_View_Interface $view)
    {
        $this->view = $view;
        return $this;
    }
    
    /**
     * Enables disqus comment thread.
     * @return string
     */
    public function disqusThread()
    {
        $config = new Zend_Config_Ini(APPLICATION_PATH . '/conf/disqus.ini', ENVIRONMENT);
        if ("" != ($shortName = $config->disqus->shortName)) {
            $params = array('shortName' => $shortName);
            return $this->view->partial('_disqus_thread.phtml', $params);
        }        
    }

}
