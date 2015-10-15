<?php
namespace Discord\Api;

interface ApiInterface
{
    public function getPerPage();
    public function setPerPage($perPage);
}