interface IValidation {
    error: boolean;
    message: string;
}

const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

export function formValidation(value: string | string[], type: string): IValidation {

    let validation = { error: false, message: '' };

    // required
    if (type.includes('required')) {
        if (!value) {
            return {
                error: true,
                message: 'Campo obrigatório.'
            }
        }
    }

    // email
    if (type.includes('email')) {
        if (!regexEmail.test(value.toString())) {
            return {
                error: true,
                message: 'E-mail inválido.'
            }
        }
    }

    // number
    if (type.includes('number')) {
        if (isNaN(Number(value))) {
            return {
                error: true,
                message: 'Este campo deve ser um número.'
            }
        }
    }

    // min:number
    if (type.includes('min')) {
        const min: string = type.split("|").filter((t) => /^min:(?!0+$)\d+$/.test(t))[0].split(":")[1];
        if (value.length < Number(min)) {
            return {
                error: true,
                message: `Deve ser maior do que ${min}`
            }
        }
    }

    // max:number
    if (type.includes('max')) {
        const max: string = type.split("|").filter((t) => /^max:(?!0+$)\d+$/.test(t))[0].split(":")[1];
        if (value.length > Number(max)) {
            return {
                error: true,
                message: `Deve ser menor do que ${max}`
            }
        }
    }

    // confirmed
    if (type.includes('confirmed')) {
        const value1 = type.split("|")[0];
        const value2 = type.split("|")[1];
        if (value1 !== value2) {
            return {
                error: true,
                message: "Os campos são incompatíveis."
            }
        }
    }

    // match:regex
    if (type.includes('match')) {
        const arr = type.split("match:");
        const regex = new RegExp(arr[arr.length - 1]);
        if (!regex.test(value.toString())) {
            return {
                error: true,
                message: "Valor inválido."
            }
        }
    }

    return validation;

}