<?php

class Page {
    private array $properties = []; // needs to be keyed array

    public function passProps(array $properties) {
        $this->properties = $properties;
    }

    public function props() : array {
        return $this->properties;
    }

    public function renderSection(string $sectionName) {
        $sectionContent = call_user_func($sectionName, $this->properties);
        return $sectionContent;
    }
}