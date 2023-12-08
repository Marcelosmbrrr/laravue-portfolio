interface IValidation {
    error: boolean;
    message: string;
}

const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

export function formValidation(value: string, type: string): IValidation {

    let validation = { error: false, message: '' };

    if (type.includes('required')) {
        if (!value) {
            return {
                error: true,
                message: 'This field is required'
            }
        }
    }

    if (type.includes('email')) {
        if (!regexEmail.test(value.toString())) {
            return {
                error: true,
                message: 'This field must be a valid email'
            }
        }
    }

    if (type.includes('number')) {
        if (isNaN(Number(value))) {
            return {
                error: true,
                message: 'This field must be a number'
            }
        }
    }

    if (type.includes('min')) {
        const min: string = type.split("|").filter((t) => /^min:(?!0+$)\d+$/.test(t))[0].split(":")[1];
        if (value.length < Number(min)) {
            return {
                error: true,
                message: `This field must be greater than ${min}`
            }
        }
    }

    if (type.includes('max')) {
        const max: string = type.split("|").filter((t) => /^max:(?!0+$)\d+$/.test(t))[0].split(":")[1];
        if (value.length > Number(max)) {
            return {
                error: true,
                message: `This field must be less than ${max}`
            }
        }
    }

    if (type.includes('confirmed')) {
        const value1 = type.split("|")[0];
        const value2 = type.split("|")[1];
        if (value1 !== value2) {
            return {
                error: true,
                message: "The fields are incompatible"
            }
        }
    }

    return validation;

}