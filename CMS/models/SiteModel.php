<?php

class SiteModel extends BaseModel {

    protected static $table = "site";

    public static function insertParameter($parameterName, $value) {
        $parameter = self::selectParameter($parameterName);
        if ($parameter) {
            Database::updateElements(self::$table, array("value" => $value), array("parameter" => $parameterName));
        } else {
            Database::insertElement(self::$table, array("parameter" => $parameterName, "value" => $value));
        }
    }

    protected static function selectParameter($parameterName) {
        $parameter = Database::selectElement(self::$table, array("parameter" => $parameterName));
        return $parameter["value"];
    }

    public static function selectHomePage() {
        return self::selectParameter("homePage");
    }

    public function selectHomePageName() {
        $homePageId = self::selectHomePage();
        $homePage =  PageModel::selectPage($homePageId);
        return $homePage["name"];
    }
}
