// code snippet

private function formErrors(): array
{
    $errors = [];
    if ($this->request()->getFiles()['picture']['name'] == "") {
        $errors[] = "Pole Súbor obrázka musí byť vyplnené!";
    }
    if ($this->request()->getValue('text') == "") {
        $errors[] = "Pole Text príspevku musí byť vyplnené!";
    }
    if ($this->request()->getFiles()['picture']['name'] != "" && !in_array($this->request()->getFiles()['picture']['type'], ['image/jpeg', 'image/png'])) {
        $errors[] = "Obrázok musí byť typu JPG alebo PNG!";
    }
    if ($this->request()->getValue('text') != "" && strlen($this->request()->getValue('text') < 5)) {
        $errors[] = "Počet znakov v text príspevku musí byť viac ako 5!";
    }
    return $errors;
}