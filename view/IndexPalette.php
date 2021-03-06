<?php

/*
class IndexPalette
{
    private $repArr = array('%AUTHORIZATION%' => '<form method="POST" action="index.php?page=authorizationctrl" class="col-md-4 authorization">
        <div class="form-group col-md-5">
            <label for="exampleInputName2">Name</label>
            <input type="text" name="loginAUTH" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
        </div>
        <div class="form-group col-md-5">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="passAUTH" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <input type="submit" name="authorization" value="Log In" class="btn btn-primary col-md-2 login" />
         <div class="col-md-8 wellcomeGuest">%WELLCOMEGUEST%</div>
        <div class="col-md-4 registration"><a href="index.php?page=registrationctrl">Registration</a></div>
    </form>', '%NEWCOMER%' => '',);

    public function __construct()
    {

    }

    public function getArr()
    {
        $obj = DataContModel::getInstance();
        $res = $obj->getInfoFlag();
        $objSess = new SessionModel();
        $sesCheck = $objSess->read('BookshopLogin');
        if ( ! $sesCheck) {
            return $this->repArr;
        } else {
            if ($res == 'newcomer') {
                $this->repArr[ '%NEWCOMER%' ] = 'Registration successful. Now Log in and buy books
                    <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>';
                $obj->clearInfoFlag();

                return $this->repArr;

            } else {
                $this->repArr[ '%AUTHORIZATION%' ] = '<div class="col-md-2 wellcome">WELLCOME ' .
                    $_SESSION[ 'BookshopLogin' ] . '</div>
                    <div class="col-md-1 logOff">
                    <form method="POST" action="index.php?page=logoffctrl">
                    <input type="submit" value="Log Off" class="btn btn-danger" />
                    </form>
                    </div>
                        <div class="col-md-1 inCart">
        <div class="items"><span>0</span> items</div>
        <a href="index.php?page=cartctrl">
            <span class="glyphicon glyphicon-shopping-cart cart" aria-hidden="true"></span></a>
        <div class="price"><span>0</span> $</div>
    </div>
    <div class="col-md-1 inCart">
        <a href="index.php?page=cabinetctrl">
        <span class="glyphicon glyphicon-book cabinet pull-left" aria-hidden="true"></span></a>
    </div>';
                return $this->repArr;
            }

        }
    }
} */

/**
 * Class IndexPalette
 */
class IndexPalette
{
    private $repArr = array('%AUTHORIZATION%' => '', '%NEWCOMER%' => '',);

    /**
     *
     */
    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function getArr()
    {
        $obj = DataContModel::getInstance();
        $res = $obj->getInfoFlag();
        $sub = new SubstitutionModel();
        $objSess = new SessionModel();
        $sesCheck = $objSess->read('BookshopLogin');
        if ( ! $sesCheck) {
            $this->repArr['%AUTHORIZATION%'] = $sub->subHTMLReplace('indexGuest.html', array());
            return $this->repArr;
        } else {
            if ($res == 'newcomer') {
                /*$this->repArr[ '%NEWCOMER%' ] = 'Registration successful. Now Log in and buy books
                    <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span>';
                $obj->clearInfoFlag();

                return $this->repArr;*/

            } else {

                $this->repArr[ '%AUTHORIZATION%' ] = $sub->subHTMLReplace('indexUser.html', array(
                    '%USER%' => $_SESSION[ 'BookshopLogin' ]));
                return $this->repArr;
            }

        }
    }
} 
