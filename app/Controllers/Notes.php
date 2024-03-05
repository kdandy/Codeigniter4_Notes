<?php

namespace App\Controllers;

use App\Models\NotesModel;

class Notes extends BaseController
{
    protected $notesModel;

    public function __construct()
    {
        $this->notesModel = new NotesModel();
    }

    public function index()
    {
        $session = session();
        $username = $session->get('username');
        $data = [
            'title' => 'Home | AlltanNotes',
            'notes' => $this->notesModel->getNotes(false, $username),
            'username' => $session->get('username'),
        ];

        return view('notes/index', $data);
    }

    public function detail($id)
    {
        $session = session();
        $username = $session->get('username');
        $data = [
            'title' => 'Detail | AlltanNotes',
            'notes' => $this->notesModel->getNotes($id, $username),
            'username' => $session->get('username'),
        ];

        // If notes not found on table
        if (empty($data['notes'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Notes not found');
        }

        return view('notes/detail', $data);
    }

    public function create()
    {
        $session = session();
        $data = [
            'title' => 'Create | AlltanNotes',
            'username' => $session->get('username'),
        ];

        return view('notes/create', $data);
    }

    public function save()
    {
        $session = session();
        $username = $session->get('username');
        $this->notesModel->save([
            'title' => htmlspecialchars($this->request->getVar('title')),
            'body' => htmlspecialchars($this->request->getVar('body')),
            'owner' => $username,
        ]);

        session()->setFlashdata('success', 'Notes has been created');

        return redirect()->to('/notes');
    }

    public function edit($id)
    {
        $session = session();
        $username = $session->get('username');
        $data = [
            'title' => 'Edit | AlltanNotes',
            'notes' => $this->notesModel->getNotes($id, $username),
            'username' => $session->get('username'),
        ];

        // If notes not found on table
        if (empty($data['notes'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Notes not found');
        }

        return view('notes/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'title' => htmlspecialchars($this->request->getVar('title')),
            'body' => htmlspecialchars($this->request->getVar('body')),
        ];

        $this->notesModel->update($id, $data);

        session()->setFlashdata('success', 'Notes has been updated');

        return redirect()->to('/notes');
    }

    public function delete($id)
    {
        $this->notesModel->delete($id);

        session()->setFlashdata('success', 'Notes has been deleted');

        return redirect()->to('/notes');
    }
}
