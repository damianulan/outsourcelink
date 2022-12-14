<?php
return [
    "accepted" => ":attribute musi zostać zaakceptowany.",
    "accepted_if" => ":attribute musi zostać zaakceptowany kiedy :other is :value.",
    "active_url" => ":attribute nie jest prawidłowym adresem URL.",
    "after" => ":attribute musi być datą po :date.",
    "after_or_equal" => ":attribute musi być datą po lub równą :date.",
    "alpha" => ":attribute może zawierać tylko litery.",
    "alpha_dash" => ":attribute może zawierać tylko litery, cyfry, myślniki i podkreślenia.",
    "alpha_num" => ":attribute może zawierać tylko litery i cyfry.",
    "array" => ":attribute musi być tablicą.",
    "before" => ":attribute musi być datą przed :date.",
    "before_or_equal" => ":attribute musi być datą przed lub równą :date.",
    "between" => [
        "array" => ":attribute musi mieć między :min i :max itemów.",
        "file" => ":attribute musi mieć między :min i :max kilobajtów.",
        "numeric" => ":attribute musi być między :min i :max.",
        "string" => ":attribute musi być między :min i :max znaków."
    ],
    "boolean" => ":attribute pole musi być prawdziwe lub fałszywe.",
    "confirmed" => ":attribute potwierdzenie nie pasuje.",
    "current_password" => "Hasło jest nieprawidłowe.",
    "custom" => ["attribute-name" => ["rule-name" => "custom-message"]],
    "date" => ":attribute nie jest prawidłową datą.",
    "date_equals" => ":attribute musi być datą równą :date.",
    "date_format" => ":attribute nie pasuje do formatu :format.",
    "different" => ":attribute i:other muszą być inne.",
    "digits" => ":attribute musi być :digits cyfr.",
    "digits_between" => ":attribute musi być pomiędzy :min i :max cyfr.",
    "dimensions" => ":attribute ma nieprawidłowe wymiary obrazu.",
    "distinct" => ":attribute pole ma zduplikowaną wartość.",
    "email" => ":attribute must be a valid email address.",
    "ends_with" => ":attribute musi kończyć się jednym z poniższych: :values.",
    "exists" => "Wybrany :attribute jest nieprawidłowy.",
    "file" => ":attribute musi być plikiem.",
    "filled" => "Pole :attribute musi mieć wartość.",
    "gt" => [
        "array" => "The :attribute musi mieć więcej niż :value itemów.",
        "file" => "The :attribute musi być większy niż :value kilobajtów.",
        "numeric" => "The :attribute musi być większy niż :value.",
        "string" => "The :attribute musi być większy niż :value znaków."
    ],
    "gte" => [
        "array" => ":attribute musi zawierać :value elementów lub więcej.",
        "file" => ":attribute musi być większy lub równy :value kilobajtów.",
        "numeric" => "The :attribute musi być większy lub równy :value.",
        "string" => "The :attribute musi być większy lub równy :value znaków."
    ],
    "image" => ":attribute musi być zdjęciem.",
    "in" => "Wybrany :attribute jest nieprawidłowy.",
    "in_array" => "Pole :attribute nie istnieje w :other.",
    "integer" => ":attribute musi być liczbą całkowitą.",
    "ip" => ":attribute musi być poprawnym adresem IP.",
    "ipv4" => ":attribute musi być poprawnym adresem IPv4.",
    "ipv6" => ":attribute musi być poprawnym adresem IPv6.",
    "json" => ":attribute musi być prawidłowym ciągiem JSON.",
    "lt" => [
        "array" => ":attribute musi mieć mniej niż :value elementów.",
        "file" => ":attribute musi mieć mniej niż :value kilobajtów.",
        "numeric" => ":attribute musi być mniejszy niż :value.",
        "string" => ":attribute musi mieć mniej niż :value znaków."
    ],
    "lte" => [
        "array" => ":attribute nie może mieć więcej niż :value elementów.",
        "file" => ":attribute musi być mniejszy lub równy :value kilobajtów.",
        "numeric" => ":attribute musi być mniejszy lub równy :value.",
        "string" => ":attribute musi być mniejszy niż lub równy :value znaków."
    ],
    "max" => [
        "array" => ":attribute nie może mieć więcej niż :max elementów.",
        "file" => ":attribute nie może być większy niż :max kilobajtów.",
        "numeric" => ":attribute nie może być większy niż :max.",
        "string" => ":attribute nie może być większy niż :max znaków."
    ],
    "mimes" => ":attribute musi być plikiem typu: :values.",
    "mimetypes" => ":attribute musi być plikiem typu: :values.",
    "min" => [
        "array" => ":attribute musi mieć przynajmniej :min elementów.",
        "file" => ":attribute musi mieć przynajmniej :min kilobajtów.",
        "numeric" => ":attribute musi mieć przynajmniej :min.",
        "string" => ":attribute musi mieć przynajmniej :min znaków."
    ],
    "multiple_of" => ":attribute musi być wielokrotnością :value.",
    "not_in" => "Wybrany :attribute jest nieprawidłowy.",
    "not_regex" => "Format :attribute jest nieprawidłowy.",
    "numeric" => ":attribute musi być liczbą.",
    "password" => "Hasło jest nieprawidłowe.",
    "present" => "Pole :attribute musi byc obecne.",
    "prohibited" => "Pole :attribute jest zabronione.",
    "prohibited_if" => "Pole :attribute jest zabronione gdy :other jest :value.",
    "prohibited_unless" => "Pole :attribute jest zabronione dopóki :other jest w :values.",
    "prohibits" => "Pole :attribute zabrania :other bycia obecnym.",
    "regex" => "Format :attribute jest nieprawidłowy",
    "required" => "Pole :attribute jest wymagane.",
    "required_if" => "Pole :attribute jest wymagane gdy :other jest :value.",
    "required_unless" => "Pole :attribute jest wymagane, chyba że :other jest w :values.",
    "required_with" => "Pole :attribute jest wymagane gdy :values jest obecne.",
    "required_with_all" => "Pole :attribute jest wymagane gdy :values są obecne.",
    "required_without" => "Pole :attribute jest wymagane gdy :values sa nie obecne.",
    "required_without_all" => "Pole :attribute jest wymagane gdy żadna z :values nie jest obecna.",
    "same" => ":attribute i :other muszą pasować.",
    "size" => [
        "array" => ":attribute musi zawierać elementy o rozmiarze  :size.",
        "file" => ":attribute musi mieć :size kilobajtów.",
        "numeric" => ":attribute musi mieć :size.",
        "string" => ":attribute musi mieć :size znaków."
    ],
    "starts_with" => ":attribute musi zaczynać się od jednej z poniższych: :values.",
    "string" => ":attribute musi być ciągiem.",
    "timezone" => ":attribute musi być prawidłową strefą czasową.",
    "unique" => ":attribute został już zajęty.",
    "uploaded" => "Przesłanie :attribute nie powiodło się.",
    "url" => ":attribute musi być poprawnym adresem URL.",
    "uuid" => ":attribute musi być prawidłowym UUID."
];
