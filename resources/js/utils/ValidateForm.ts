interface Validation {
    is_valid: boolean;
    results: {
        [key: string]: { error: boolean, message: string }
    };
}

interface Form {
    [key: string]: { value: any, rule: string }
}

export function validateForm(form: Form): Validation {

    let validation: Validation = { is_valid: true, results: {} };
    for (let field in form) {
        validation.results[field] = {
            error: false,
            message: ''
        }
    }

    for (let field in form) {

        const value = form[field].value;
        const rules = form[field].rule.split("|");

        // required
        if (rules.some((rule) => rule.includes("required"))) {
            if (String(value).length === 0) {
                validation.is_valid = false;
                validation.results[field] = {
                    error: true,
                    message: 'Campo obrigatório.'
                }
                continue;
            }
        }

        // email
        if (rules.some((rule) => rule.includes("email"))) {
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value.toString())) {
                validation.is_valid = false;
                validation.results[field] = {
                    error: true,
                    message: 'E-mail inválido.'
                }
                continue;
            }
        }

        // number
        if (rules.some((rule) => rule.includes("number"))) {
            if (isNaN(Number(value))) {
                validation.is_valid = false;
                validation.results[field] = {
                    error: true,
                    message: 'Este campo deve ser um número.'
                }
                continue;
            }
        }

        // min:number
        if (rules.some((rule) => rule.includes("min"))) {
            const min: string = rules.filter((t) => /^min:(?!0+$)\d+$/.test(t))[0].split(":")[1];
            if (value.length < Number(min)) {
                validation.is_valid = false;
                validation.results[field] = {
                    error: true,
                    message: `Deve ser maior do que ${min}`
                }
                continue;
            }
        }

        // max:number
        if (rules.some((rule) => rule.includes("max"))) {
            const max: string = rules.filter((t) => /^max:(?!0+$)\d+$/.test(t))[0].split(":")[1];
            if (value.length > Number(max)) {
                validation.is_valid = false;
                validation.results[field] = {
                    error: true,
                    message: `Deve ser menor do que ${max}`
                }
                continue;
            }
        }

        // match:a,b,c,...
        if (rules.some((rule) => rule.includes("match"))) {
            const arr_match = rules.filter((rule) => rule.includes("match"))[0].split(":")[1].split(",");
            if (!arr_match.includes(value)) {
                validation.is_valid = false;
                validation.results[field] = {
                    error: true,
                    message: "Valor inválido"
                }
                continue;
            }
        }

    }

    return validation;

}