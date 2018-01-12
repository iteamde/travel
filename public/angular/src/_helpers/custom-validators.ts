import { ValidatorFn } from "@angular/forms/src/directives/validators";
import { AbstractControl } from "@angular/forms/src/model";

export function ConfirmPasswordValidator(pass: AbstractControl): ValidatorFn {
    return (control: AbstractControl): {[key: string]: any} => {
        const forbidden = control.value != pass.value;
        return forbidden ? {'ConfirmPassword': {value: control.value}} : null;
    };
}