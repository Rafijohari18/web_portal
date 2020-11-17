<?php

namespace App\Services\Interfaces;

interface ConfigServiceInterface
{
    public function getConfig(int $gId);
    public function getBanner();
    public function getFileAnalytics();
    public function getValue($value);
    public function update($name, $value);
    public function changeBanner($request);
    public function changeFileAnalytics($request);
    /**Language */
    public function getAllLang();
    public function getLang($request);
    public function countLang($request);
    public function getLangNot();
    public function createLang($request);
    public function findLang(int $id);
    public function updateLang($request, int $id);
    public function statusLang(int $id);
    public function deleteLang(int $id);
    /**visitor */
    public function visitor();
    public function findVisitor($ip);
    public function graphicVisitor($year, $month);
    public function visitorToday();
    public function visitorWeek();
    public function visitorMonth();
    public function visitorYear();
    public function addVisitor($request);
}