<?php

namespace App\Livewire;

use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CadastroCliente extends Component
{

    public $nome, $endereco, $telefone, $cpf, $email, $password;

    protected $rules = [
        'nome' => 'required|string|max:150',
        'endereco' => 'required|string|max:100',
        'telefone' => 'required|string|max:15',
        'cpf' => 'required|string|unique:clientes,cpf|max:15',     // Validação de CPF único
        'email' => 'required|string|max:80|email|unique:clientes,email',      // Validação de email único
        'password' => 'required|string|min:6|max:255',      // Confirmação de senha
    ];

    protected $messages = [
        'nome.required' => 'O nome é obrigatório.',
        'nome.string' => 'O nome deve ser uma string válida.',
        'nome.max' => 'O nome não pode ter mais de 150 caracteres.',
        
        'endereco.required' => 'O endereço é obrigatório.',
        'endereco.string' => 'O endereço deve ser uma string válida.',
        'endereco.max' => 'O endereço não pode ter mais de 100 caracteres.',
        
        'telefone.required' => 'O telefone é obrigatório.',
        'telefone.string' => 'O telefone deve ser uma string válida.',
        'telefone.max' => 'O telefone não pode ter mais de 15 caracteres.',
        
        'cpf.required' => 'O CPF é obrigatório.',
        'cpf.string' => 'O CPF deve ser uma string válida.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
        'cpf.max' => 'O CPF não pode ter mais de 15 caracteres.',
        
        'email.required' => 'O e-mail é obrigatório.',
        'email.string' => 'O e-mail deve ser uma string válida.',
        'email.email' => 'Por favor, insira um e-mail válido.',
        'email.unique' => 'Este e-mail já está cadastrado.',
        'email.max' => 'O e-mail não pode ter mais de 80 caracteres.',
        
        'password.required' => 'A senha é obrigatória.',
        'password.string' => 'A senha deve ser uma string válida.',
        'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
        'password.max' => 'A senha não pode ter mais de 255 caracteres.',
    ];

    

    
    public function render()
    {
        return view('livewire.cadastro-cliente');
    }


    public function store()
    {
        $this->validate();

            Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'password' => Hash::make($this->password),  // Criptografando a senha
        ]);

        session()->flash('sucesso', 'Cliente cadastrado com sucesso!');
        
        // Resetando os campos do formulário
        $this->reset();

        // Redirecionando ou outro comportamento após cadastro (opcional)
    }
}
