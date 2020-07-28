import { programs } from './data.js'

$(document).ready(function(){

    const fieldTemplate = (programm) => `
    <section class="programms-item" data-field="${programm.slug}">
        <figure class="programms-item__image">
            <img src="${programm.image}" />
        </figure>
        <h2 class="programms-item__title">${programm.title}</h2>
        <button class="programms-item__btn" data-target="programm-modal">დეტალურად</button>
    </section>
    `

    const programDetailContent = (program) => `
        <header class="program-detail__header">
            <h3 class="program-detail__title">${program.title}</h3>
        </header>
        <section class="program-detail__content">
            <article>
                ${program.description || ''}
            </article>
            <article class="spacing small">
                <strong>პროგრამის ხანგძლივობა შეადგენს საშუალოდ ${program.duration || ''} წელს</strong>
            </article>
            <article class="spacing small">
                <strong>პროფესიული სპეციალიზაცია/სპეციალიზაციები:</strong> ${program.profession || ''}
            </article>
            <article class="spacing small">
                <strong>დაშვების წინაპირობა/წინაპირობები:</strong> ${program.prerequisite || ''}
            </article>
            <article class="spacing small">
                <strong>განმახორციელებელი კოლეჯები: </strong>
                <ul>
                    ${program.colleges && program.colleges.map(college=>`<li>${college}</li>`).join('')}
                </ul>
            </article>
            <article class="spacing small">
                <strong>პროგრამის დასრულების შემდეგ, კურსდამთავრებულს შეეძლება:</strong>
                <ul>
                    ${program.perspectives && program.perspectives.map(perspective=>`<li>${perspective}</li>`).join('')}
                </ul>
            </article>
            <article class="spacing small">
                <strong>დასაქმების შესაძლებლობები:</strong>
                <p class="sub-article">${program.jobPerspective || ''}</p>
                ${program.jobPerspectiveArray && `<ul>${program.jobPerspectiveArray.map(item=>`<li>${item}</li>`).join('')}</ul>`}
            </article>
        </section>
    `

    const handleProgramDetailsClick = () => {
        $('.programms-item__btn').click(function(){
            const target = $(this).data('target')
            const elem = $(`#${target}`)
    
           elem.addClass('opened')
    
           const field = $(this).parent().data('field')
           const programDetail = programs.find(program=>program.slug === field)
           const template = programDetailContent(programDetail)
           $(`#${target} .modal-content`).html(template)
        })
    }

    const currentPrograms = programs.filter(program=>(
        program.type === 'current'
    ))
    
    const elements = currentPrograms.map(program=>(
        fieldTemplate(program)
    ))

    $('.programms .programms-grid').append(elements)


    $('.programms__tabs-item').click(function(){
        const selectedProgram = $(this).data('programm')

        const selectedPrograms = programs.filter(program=>(
            program.type === selectedProgram
        ))
        
        const elements = selectedPrograms.map(programm=>{
            return fieldTemplate(programm)
        })

        $(`.programms .programms-grid`).html(elements)


        handleProgramDetailsClick()

    })

    handleProgramDetailsClick()


})