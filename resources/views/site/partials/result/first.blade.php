<div class="col-12 text-center">
    <h1 class="text-dark font-bold">Parabéns </h1>
    <img class="w-75 mt-2"
        src="{{asset('assets/images/confetti-png-gif-3.gif')}}" alt="confete">
    <img class="w-25 mb-4" src="{{asset('assets/images/first_place.png')}}"
        alt="trofeu">

    <p class="fz-18">Muito Bom! Você acertou <span class="font-bold
            text-success">{{$_SESSION['score']}}</span>/10 questões.</p>

    <p class="fz-18">Total pontos: <span class="font-bold text-red">{{$_SESSION['score']
            * 10}} Pontos.</span></p>
</div>