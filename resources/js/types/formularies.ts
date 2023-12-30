interface IForm {
    [key: string]: { value: string, validation: string }
}

type Validation<T> = {
    [P in keyof T]?: { error: boolean, message: string }
}