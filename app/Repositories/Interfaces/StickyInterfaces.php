<?php

namespace App\Repositories\Interfaces;

interface StickyInterfaces
{
    public function index();
    public function show();
    public function store($data);
    public function edit($id);
    public function update($id, $data);
    public function delete($id);
    public function highPrior();
    public function mediumPrior();
    public function lowPrior();
    public function notifications();
    public function calenderView();
    public function markAsRead($id);
    public function viewSticker($id);
}
