export const messageDialog = (icono, mensaje) => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 2500,
    });
    
    Toast.fire({
        icon: icono,
        title: mensaje
    });
};


/**
 * Función para calcular el promedio de un conjunto de notas, sin especificar 
 * la cantidad de notas.
 * @param  {...any} notas 
 * @returns 
 */
export const calcularPromedio = (...notas) => {
    let suma = 0;

    notas.forEach(nota => {
        suma += nota;
    });

    return (suma / notas.length).toFixed(2);
}; 