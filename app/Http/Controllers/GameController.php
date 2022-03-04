<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    

    //retorna twela inicial do jogo com as opções de escolhas
    public function index(Request $request){

        //cria as variáveis de sessão para controlar rodada, pontuação e o histórico de perguntas já respondidas
        session_start();
        session_reset();
        $_SESSION['turn'] = 0;
        $_SESSION['score'] = 0;
        $_SESSION['array'] = new Collection();

        $categorias = DB::table('categorias')->orderBy('category', 'asc')->get();
        return view('site.index', ['categorias' => $categorias]);


    }

    //inicia o jogo buscando as questões de forma alaatória no banco pelos dados que vem do request do formulário da página inicial.
    public function game(Request $request){


        //armazena as opções em sessão para fazer a query via get nas próximas rodadas do game
        session_start();
        $_SESSION['category'] = $request->input('category');
        $_SESSION['difficulty'] = $request->input('difficulty');
       
        //contagem de rodadas do jogo
        $_SESSION['turn']+=1;
        

        if($_SESSION['turn'] <= 10){
        $questions = Question::where('id_categoria', $_SESSION['category'])
        ->where('difficulty', $_SESSION['difficulty'])
        ->inRandomOrder()
        ->limit(1)
        ->get();

        return view('site.game', ['questions' => $questions]);

        }
        
    }

    //da sequência ao game 
    public function gameNext(){

        session_start();

        $_SESSION['turn']+=1;
        
        //busca uma nova questão ao responder a anterior , até chega na rodada 10 que é o último turno.
        if($_SESSION['turn'] <= 10){
        $questions = Question::where('id_categoria', $_SESSION['category'])
        ->where('difficulty', $_SESSION['difficulty'])
        ->inRandomOrder()
        ->limit(1)
        ->get();  
            
        return view('site.game', ['questions' => $questions]);

        }
        //caso atinga a rodada final a próxima exibe a tela de resultado, a condição abaixo mostra a nota atingida de acordo com total de questões certa respondidas
        else{
            $media = 0;
            if($_SESSION['score'] > 6){
                $media = 1;
            }
            else if($_SESSION['score'] >= 4){
                $media = 2;
            }
            else if($_SESSION['score'] < 4){
                $media = 3;
            }

            return view('site.result', ['media' => $media]);
        }
    }


    //verifica e adiciona um ponto positivo se a opção marcada está correta 
    public function calc(Request $request){

        session_start();
        if($request->input('option') == $request->input('correct_answer') ){
            $_SESSION['score']++;
        }

        //busca no banco a questão respondida pelo id e atribui seus valores em um array com a lista de questões 
        $question = Question::find($request->id);
        
        $arr = [
            'question' => $question->question,
            'options'=> $question->options,
            'correct_answer' => $question->correct_answer,
            'option_selected' => $request->input('option')
        ];

        //Adiciona o array na varivael global que é do tipo collection
        $_SESSION['array']->push($arr);

        return redirect()->route('site.game.next');
    }


    //retorna a view com a lista de respostas das questões ao final do game
    public function answers(){

        session_start();

        return view('site.answers', ['answers' => $_SESSION['array'] ]);
    }
}
