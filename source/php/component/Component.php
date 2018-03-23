<?php

abstract class Component
{
    protected $children;

    protected function __construct($children)
    {
        $this->children = $children;
    }

    public static function mount($components)
    {
        $components = is_array($components) ? $components : [$components];
        foreach ($components as $component) {
            if ($component instanceof Component) {
                $component->render();
            } else {
                echo htmlentities($component);
            }
        }
    }

    abstract protected function render();
}