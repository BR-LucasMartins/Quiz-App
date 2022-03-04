<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::paginate(25);

        return view('app.perguntas.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = DB::table('categorias')->orderBy('category', 'asc')->get();

        return view('app.perguntas.create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'question' => 'required',
            'category' => 'required',
            'difficulty' => 'required',
            'option-1' => 'required',
            'option-2' => 'required',
            'option-3' => 'required',
            'option-4' => 'required',
            'corret_answer' => 'required'
        ];

        $feedback = [
            'required' => 'Campo obrigatório',
        ];

        //VALIDAÇÃO DO FORMULÁRIO
        $request->validate($rules, $feedback);

        //concantena todas as opções em uma string separa por ";" para explode na tabela de visualisação.
        $options = $request->input('option-1').";". $request->input('option-2').";". $request->input('option-3').";". $request->input('option-4').";". $request->input('option-5');
        
        $question = new Question();

        $question->question = $request->input('question');
        $question->options = $options;
        $question->correct_answer = $request->input('corret_answer');
        $question->id_categoria = $request->input('category');
        $question->difficulty = $request->input('difficulty');

        //salva a questão no bnco de dados 
        $question->save();

        return redirect()->route('pergunta.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $categorias = Categoria::all();
        return view('app.perguntas.edit', ['question' => $question, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'question' => 'required',
            'category' => 'required',
            'difficulty' => 'required',
            'option-1' => 'required',
            'option-2' => 'required',
            'option-3' => 'required',
            'option-4' => 'required',
            'corret_answer' => 'required'
        ];

        $feedback = [
            'required' => 'Campo obrigatório',
        ];

        $request->validate($rules, $feedback);
        $options = $request->input('option-1').";". $request->input('option-2').";". $request->input('option-3').";". $request->input('option-4').";". $request->input('option-5');
        
        DB::table('questions')
        ->where('id', $id)
        -> update([
            'question' => $request->input('question'),
            'options' => $options,
            'correct_answer' => $request->input('corret_answer'),
            'id_categoria' => $request->input('category'),
            'difficulty' => $request->input('difficulty')
        ]);

        return redirect()->route('pergunta.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        echo "hello world";
    }

    public function delete( $id)
    {
        $question = Question::find($id);
        $question->delete();

        return redirect()->route('pergunta.index');
    }
}
