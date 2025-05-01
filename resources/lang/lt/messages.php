<?php

return [
    'cars' => 'Automobiliai',
    'owners' => 'Savininkai',
    'shortcodes' => 'Trumpi kodai',
    'home' => 'Pagrindinis',
    'login' => 'Prisijungti',
    'register' => 'Registruotis',
    'logout' => 'Atsijungti',


    'car_insurance' => 'Automobilių draudimas',
    'car_details' => 'Automobilio detalės',
    'add_new_car' => 'Pridėti naują automobilį',
    'edit_car' => 'Redaguoti automobilį',
    'reg_number' => 'Registracijos numeris',
    'brand' => 'Markė',
    'model' => 'Modelis',
    'owner' => 'Savininkas',
    'car' => 'Automobilis',
    'actions' => 'Veiksmai',
    'no_cars_found' => 'Automobilių nerasta',


    'owner_details' => 'Savininko detalės',
    'add_new_owner' => 'Pridėti naują savininką',
    'edit_owner' => 'Redaguoti savininką',
    'name' => 'Vardas',
    'surname' => 'Pavardė',
    'phone' => 'Telefonas',
    'email' => 'El. paštas',
    'address' => 'Adresas',
    'cars_owned' => 'Turimi automobiliai',
    'no_owners_found' => 'Savininkų nerasta',


    'shortcode_details' => 'Trumpo kodo detalės',
    'add_new_shortcode' => 'Pridėti naują trumpą kodą',
    'edit_shortcode' => 'Redaguoti trumpą kodą',
    'shortcode' => 'Trumpas kodas',
    'replace_text' => 'Pakeitimo tekstas',
    'usage' => 'Naudojimas',
    'no_shortcodes_found' => 'Trumpų kodų nerasta',


    'view' => 'Peržiūrėti',
    'edit' => 'Redaguoti',
    'delete' => 'Ištrinti',
    'submit' => 'Pateikti',
    'update' => 'Atnaujinti',
    'cancel' => 'Atšaukti',
    'back' => 'Grįžti',


    'delete_confirm' => 'Ar tikrai norite ištrinti?',
    'created_successfully' => ':item sėkmingai sukurtas!',
    'updated_successfully' => ':item sėkmingai atnaujintas!',
    'deleted_successfully' => ':item sėkmingai ištrintas!',


    //placeholderiai, ilgi sakiniai(shortcode)
    'enter_shortcode_without_brackets'=>'Įveskite trumpąjį kodą be laužtinių skliaustų',
    'this_willbeused'=> 'Tai bus naudojama kaip [[JūsųTrumpasisKodas]] jūsų duomenyse.',
    'to_replacewith'=>'Įveskite tekstą su kuriuo pakeisite trumpąjį kodą',
    'select_owner' => 'Pasirinkti savininką',

    'id' => 'ID',
    'dashboard' => 'Valdymo skydelis',
    'logged_in' => 'Jūs prisijungę!',
    'contact_us' => 'Susisiekite su mumis',

    // Validation messages for cars
    'reg_number_required' => 'Registracijos numeris yra privalomas',
    'reg_number_format' => 'Registracijos numeris turi būti formatu AAA000 (3 didžiosios raidės ir 3 skaitmenys)',
    'reg_number_unique' => 'Šis registracijos numeris jau naudojamas',
    'brand_required' => 'Markė yra privaloma',
    'brand_min' => 'Markės pavadinimas turi būti bent 2 simbolių',
    'model_required' => 'Modelis yra privalomas',
    'model_min' => 'Modelio pavadinimas turi būti bent 1 simbolio',
    'owner_id_required' => 'Savininkas yra privalomas',
    'owner_not_exist' => 'Pasirinktas savininkas neegzistuoja',

    // Validation messages for owners
    'name_required' => 'Vardas yra privalomas',
    'name_min' => 'Vardas turi būti bent 2 simbolių',
    'surname_required' => 'Pavardė yra privaloma',
    'surname_min' => 'Pavardė turi būti bent 2 simbolių',
    'phone_required' => 'Telefono numeris yra privalomas',
    'phone_format' => 'Telefono numeris turi turėti 8-15 skaitmenų ir gali prasidėti "+"',
    'email_required' => 'El. paštas yra privalomas',
    'email_format' => 'Įveskite galiojantį el. pašto adresą',
    'email_unique' => 'Šis el. paštas jau naudojamas',
    'address_required' => 'Adresas yra privalomas',
    'address_min' => 'Adresas turi būti bent 5 simbolių',

    'enter_reg_number' => 'Įveskite registracijos numerį (pvz., ABC123)',
    'reg_number_help' => 'Formatas: 3 didžiosios raidės ir 3 skaitmenys',
    'enter_brand' => 'Įveskite automobilio markę (pvz., Toyota)',
    'enter_model' => 'Įveskite automobilio modelį (pvz., Corolla)',
    'enter_name' => 'Įveskite vardą',
    'enter_surname' => 'Įveskite pavardę',
    'enter_phone' => 'Įveskite telefono numerį (pvz., +37061234567)',
    'phone_help' => 'Jei reikia, pridėkite šalies kodą',
    'enter_email' => 'Įveskite el. pašto adresą',
    'enter_address' => 'Įveskite pilną adresą',
];
