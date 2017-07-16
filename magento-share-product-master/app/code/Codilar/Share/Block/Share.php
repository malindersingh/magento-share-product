<?php

namespace Codilar\Share\Block;

use Magento\Backend\Block\Template;
use Magento\Framework\App\Action\Context as Action;
use Magento\Backend\Model\Session;

class Share extends Template
{
    public function __construct(
        Template\Context $context,
        Action $action,
        Session $session,
        array $data = [])
    {
        $this->session = $session;
        $this->action = $action;
        parent::__construct($context, $data);
    }

    /**
     * Path to template file in theme
     *
     * @var string
     */
    protected $_template = 'page/copyright.phtml';

    public function getFullAction()
    {
        $action = $this->action->getRequest()->getFullActionName();
        return $action;
    }

    public function isProductPage()
    {
        if($this->getFullAction() == "catalog_product_edit"){
            return true;
        }
        return false;
    }

    public function isSaved()
    {
        $pro =  $this->session->getProductSaved();
        $this->session->unsProductSaved();
        return $pro;
    }

}