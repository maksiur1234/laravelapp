<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for visit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Umów wizytę
                    <form action="" method="POST">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                        @csrf
                        <div class="form-group"><br> 
                        <label for="date">Wybierz użytkownika:<br></label>
                        <select name="user">
                            @foreach($users as $userName)
                                <option name="user">
                                {{ $userName->name }} {{ $userName->surname}}
                            @endforeach
                                </option>
                            </select><br>
                            <label for="date">Wybierz datę:<br></label>
                            <input type="date" name="date"/><br>
                            <label for="doctorName">Wybierz doktora:<br></label>
                            <select name="doctor">
                            @foreach($doctors as $doctorName)
                                <option name="doctor">
                                {{ $doctorName->name}} {{ $doctorName->surname}}
                            @endforeach
                                </option>
                            </select>
                            <br><br>
                            <input type="submit" name="submit" value="Umów wizytę" style="border: solid black 1px"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
