<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WebUser
 *
 * @author andy
 */
class WebUser extends CWebUser {
    const ROLE_ADMIN='1';
    const ROLE_PT='2';
    const ROLE_KOPERTIS='3';
    const ROLE_PESERTA='4';
    const ROLE_JURI='5';
    /**
     * this method is used for checking user right access
     * @param <string> $operation
     * @param <array> $params
     * @return <boolean>
     */
    public function checkAccess($operation, $params=array(),$allowCaching=true) {
        $role = $this->getState('role');
        return ($operation === $role);
    }

    public static function isAdmin()
    {
        return (Yii::app()->user->getState('role')==WebUser::ROLE_ADMIN);
    }
    public static function isUserPT()
    {
        return (Yii::app()->user->getState('role')==WebUser::ROLE_PT);
    }
    public static function isPTN()
    {
        return (Yii::app()->user->getState('isnegeri')==MasterPT::NEGERI);
    }
    public static function isKopertis()
    {
        return (Yii::app()->user->getState('role')==WebUser::ROLE_KOPERTIS);
    }
    public static function isJuri()
    {
        return (Yii::app()->user->getState('role')==WebUser::ROLE_JURI);
    }
    public static function isPeserta()
    {
        return (Yii::app()->user->getState('role')==WebUser::ROLE_PESERTA);
    }
    public static function isFinalis(){
        return Yii::app()->user->getState('isFinalis');
    }
    public static function isGuest()
    {
        return Yii::app()->user->isGuest;
    }
}
?>
