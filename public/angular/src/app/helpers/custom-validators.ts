import { ValidatorFn } from "@angular/forms/src/directives/validators";
import { AbstractControl } from "@angular/forms/src/model";

export function ConfirmPasswordValidator(pass: AbstractControl): ValidatorFn {
    return (control: AbstractControl): {[key: string]: any} => {
        const confirmation = control.value != pass.value;
        return confirmation ? {'ConfirmPassword': {value: control.value}} : null;
    };
}