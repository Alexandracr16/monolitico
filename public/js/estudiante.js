const borrarEstudianteModal = document.getElementById('borrarEstudianteModal');
const borrarEstudianteForm = document.forms['borrarEstudianteForm'];

const onClickBorrar = (codigo)=>{
    borrarEstudianteForm['codigo'].value = codigo;
    borrarEstudianteModal.classList.add('open');
}

borrarEstudianteForm.addEventListener('reset', () =>{
    borrarEstudianteForm['codigo'].value = '';
    borrarEstudianteModal.classList.remove('open');
});