@include('layouts.header')
@yield('content')
@include('layouts.footer')

{{--
    @includeIf('layouts.message')
    @includeWhen(!empty($card),'layouts.logic')
    @includeUnless(empty($card),'layouts.logic')
    @includeFirst(['layouts.header','layouts.footer','layouts.message']) 

Some Explanations:
@includeWhen(true,'layouts.logic')
@includeUnless(false,'layouts.logic')

@includeFirst(['layouts.header','layouts.footer','layouts.message'],['status'=>'Active']) 
will print also varaible status if its exist in one of the views inside the array and it will be ignored in other views.


Description :
    @includeIf wont pop error messages if the message file not exist and it will just skip it
    @includeWhen will be included if the condition is true
    @includeUnless will be included if the condition is false
    @includeFirst will include the first file that exist and ignore the remain

--}}







