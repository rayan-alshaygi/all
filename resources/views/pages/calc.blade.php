{{-- <form method ="post">
{{csrf_field()}}
First Number <input type = "number" name="num1" required/>
</br>
Second Number <input type = "number" name="num2" required/>
</br>
<input type="submit" value="calc">


</form> --}}
{{$errors}}
{{Form::open()}}
    {{Form::label('num1','First Number')}}
    {{Form::number('num1')}}
    </br>
    {{Form::label('num2',"Second Number")}}
     {{Form::number('num2')}}
    </br>
        </br>
    {{Form::label('password',"Password")}}
     {{Form::password('password')}}
     </br>
         {{Form::label('password_confirmation',"Password Confirmation")}}
     {{Form::password('password_confirmation')}}
    {{Form::submit('Calculate')}}
{{Form::close()}}