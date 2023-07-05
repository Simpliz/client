<x-app-layout>
    <div>
        <h1 class="text-3xl font-bold">{{ $quiz->name }}</h1>
        <p>{{ $quiz->description }}</p>
        <p>{{ $quiz->questions_count }} {{ __('Questions') }}</p>
        <p>{{ $quiz->duration }} {{ __('Minutes') }}</p>
    </div>
    @if(count($results))
    <div>
        <h2>Your Results</h2>
        <ul>
            @foreach($results as $result)
            <li><span></span><span>{{ date('d F Y H:i', strtotime($result->created_at)) }}</span></li>
            @endforeach
        </ul>
    </div>
    @endif
    <div>
        <a href="{{ route('quizzes.index') }}">
            <button type="button">{{ __('Back') }}</button>
        </a>
        @if($unfinishedResult)
        <a href="{{ route('quizzes.sessions.show_questions', $unfinishedResult->id) }}">{{ __('Continue') }}</a>
        @else
        <form action="{{ route('quizzes.sessions.start') }}" method="post">
            @csrf
            <input type="hidden" name="quizId" value="{{ $quiz->id }}">
            <button type="submit">{{ __('Start') }}</button>
        </form>
        @endif
    </div>
</x-app-layout>