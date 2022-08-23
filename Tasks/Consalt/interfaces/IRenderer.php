<?php


namespace app\interfaces;


interface IRenderer
{
    public function renderTemplate($template, $params = []);
}