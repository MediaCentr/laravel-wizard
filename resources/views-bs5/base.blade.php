@extends('layouts.app')

@section('content')
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1 class="text-center">{{ $wizardTitle }}</h1>

                <div class="mb-3">
                    @include($getViewPath('steps_bar'))
                </div>

                <form action="{{ $getActionUrl($postAction, [$step->slug()]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @include($step->view(), compact('step', 'errors'))

                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            @if ($stepRepo->hasPrev())
                             <button type="button" class="btn btn-primary"  onclick="this.form.action = '{{ $getActionUrl($postAction, [$step->slug(), '_trigger' => 'back']) }}'; this.form.submit();">
                                    @lang('wizard::generic.back')
                                </button>
                            @endif
                        </div>

                        <div class="ms-auto">
                            @if ($step->skip())
                                <button type="button" class="btn btn-secondary me-2" onclick="this.form.action = '{{ $getActionUrl($postAction, [$step->slug(), '_trigger' => 'skip']) }}'; this.form.submit();">
                                    @lang('wizard::generic.skip')
                                </button>
                            @endif

                            @if ($stepRepo->hasNext())
{{--                                <button  >--}}
{{--                                    @lang('wizard::generic.next')--}}
{{--                                    Suivant--}}
{{--                                </button>--}}
                               {{-- <input type="submit"  class="btnStep" id="btnNext"  value="Suivant">--}}


                                    <input type="submit" class="btnStep" id="btnNext" value="Suivant" style="display: none;">
                            @else
                                <button type="submit" class="btn btn-primary">
{{--                                    @lang('wizard::generic.done')--}}
                                    Terminer
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
