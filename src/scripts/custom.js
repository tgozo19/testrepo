//Logout
$('.logout').on('click', function() {
    fetch("api/logout.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        if (data.result == "done") {
            window.open('index.php', '_self');
        }
    })
    return false
})

function renderHeaderMenu() {
    fetch("api/userdetails/user-details.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        const name = `<span class='user-name'> ${data.name} </span>`
        const avatar = `<img src='${data.picture}' alt='' class='avatar-photo' style='width: 100%;'>`
        const picture = `<img src='${data.picture}' alt=''>`
        const schoolInfo =
            `
                <h5 class="text-center h5 mb-0"> ${data.name} </h5>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                    <ul>
                        <li>
                            <span>Email Address:</span>
                            ${data.email}
                        </li>
                        <li>
                            <span>Phone Number:</span>
                            ${data.phone}
                        </li>
                        <li>
                            <span>Address:</span>
                            ${data.address}
                        </li>
                    </ul>
                </div>
            `
        document
            .querySelector("#myUserIcon")
            .insertAdjacentHTML("afterbegin", picture)
        document
            .querySelector("#myName")
            .insertAdjacentHTML("afterbegin", name)
        document
            .querySelector("#schoolInfo")
            .insertAdjacentHTML("afterbegin", schoolInfo)
        document
            .querySelector("#schoolIcon")
            .insertAdjacentHTML("afterbegin", avatar)
    })
}

function renderTermState() {
    fetch("api/term-state.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        const state = `${
            data.result == "current term"
            ?
            `<li>
                <a href="end-term.php" class="dropdown-toggle no-arrow">
                    <span class="micon ion-minus-round"></span><span class="mtext"> End Term </span>
                </a>
            </li>
            `
            :
            `
            <li>
                <a href="create-term.php" class="dropdown-toggle no-arrow">
                    <span class="micon ion-plus-round"></span><span class="mtext"> Start New Term </span>
                </a>
            </li>
            `
        }`
        document
            .querySelector("#term-state")
            .insertAdjacentHTML("afterbegin", state)
    })
}

function renderLevels() {
    fetch("api/userdetails/level.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        console.log(data)
        const levels = data.level.map(item => {
            return `
                <div class="col-lg-3 col-md-6 col-sm-12 mb-30" style='float: left'>
                    <div class="da-card">
                        <div class="da-card-photo">
                            <a href='level.php?q=${item.ref}'>
                                <img src="${item.picture}" alt="" style='height: 240px; transform: scale(1.2)'>
                            </a>
                        </div>
                        <a href='level.php?q=${item.ref}'>
                            <div class="da-card-content">
                                <h5 class="h5 mb-10">${item.name}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            `
        })
        .join("")
        document
            .querySelector("#myLevels")
            .insertAdjacentHTML("afterbegin", levels)
    })
}

function renderLevelsOnAddClass() {
    fetch("api/userdetails/level.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        console.log(data)
        const levels = data.level.map(item => {
            return `
                <option value='${item.ref}'> ${item.name} </option>
            `
        })
        .join("")
        document
            .querySelector("#addLevel")
            .insertAdjacentHTML("afterbegin", levels)
    })
}

function renderClasses() {
    let a = location;
    let b = a.toString()
    let c = b.split('?q=');
    let request = c[1];
    fetch("api/userdetails/classes.php?q=" + request)
    .then(response => {
        return response.json()
    })
    .then(data => {

        const breadcrumb = `<li class="breadcrumb-item active" aria-current="page">${data.levelName}</li>`
        document
            .querySelector("#levelBreadcrumb")
            .insertAdjacentHTML("beforeend", breadcrumb)


        if (data.result != 'success') {
            const classes = `
                        <div class="da-card" style='width: 100%; margin-bottom: 2%'>
                            <div class="da-card-content">
                                <div class='row'>
                                    <div class='col-md-3'></div>
                                    <div class='col-md-6'>
                                        <p class="text-center" style='font-size: 18px; font-weight: 600; margin-bottom: 10%;'> You currently don't have any ${data.levelName} classes </p>
                                        <p class="text-center" style='font-size: 18px; font-weight: 600; margin-bottom: 10%;'> To add a class use the button below </p>
                                        <p class='text-center'> <a href='add-class.php' class="btn btn-primary btn-lg"> Add Class <a> </p>
                                    </div>
                                    <div class='col-md-3'></div>
                                </div>
                            </div>
                        </div>
                    `
            document
                .querySelector("#myClasses")
                .insertAdjacentHTML("afterbegin", classes)
        } else {
            const classes = data.classes.map(item => {
                return `
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30" style='float: left'>
                        <div class="da-card">
                            <div class="da-card-photo">
                                <a href='class.php?q=${item.ref}'>
                                    <img src="${item.picture}" alt="" style='height: 240px'>
                                </a>
                            </div>
                            <a href='class.php?q=${item.ref}'>
                                <div class="da-card-content">
                                    <h5 class="h5 mb-10">${item.name}</h5>
                                    <p class="mb-0"> Class Teacher: ${item.classTeacher}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                `
            })
            .join("")
            document
                .querySelector("#myClasses")
                .insertAdjacentHTML("afterbegin", classes)
        }
    })
}

function renderTeachersOnAddClass() {
    fetch("api/userdetails/teachers.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        if (data.result == 'success') {
            const teachers = data.teachers.map(item => {
                return `
                    <option value='${item.name}'> ${item.name} </option>
                `
            })
            .join('')
            document
                .querySelector("#addTeacher")
                .insertAdjacentHTML("afterbegin", teachers)
        } else {
            const teachers = `<option value='--'> -- </option>`
            document
                .querySelector("#addTeacher")
                .insertAdjacentHTML("afterbegin", teachers)
        }
    })
}

function renderClassesOnAddStudent() {
    fetch("api/userdetails/get-classes.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        console.log(data)
        const studentClass = data.map(item => {
            return `
                <option value='${item.classRef}'> ${item.className} </option>
            `
        })
        .join('')
        document
            .querySelector("#studentClass")
            .insertAdjacentHTML("afterbegin", studentClass)
    })
}

function renderClassStudents() {
    let a = location;
    let b = a.toString()
    let c = b.split('?q=');
    let request = c[1];
    fetch("api/userdetails/students.php?q="+request+"")
    .then(response => {
        return response.json()
    })
    .then(data => {
        if (data.result == 'success') {
            const students = data.students.map(item => {
                return `
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-30" style='float: left'>
                        <div class="da-card">
                            <div class="da-card-photo">
                                <a href='student.php?q=${item.ref}'>
                                    <img src="${item.picture}" alt="" style='height: 240px'>
                                </a>
                            </div>
                            <a href='student.php?q=${item.ref}'>
                                <div class="da-card-content">
                                    <h5 class="h5 mb-10">${item.name}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                `
            })
            .join("")
            document
                .querySelector("#classStudents")
                .insertAdjacentHTML("afterbegin", students)
        } else {
            const students = `
                        <div class="da-card" style='width: 100%; margin-bottom: 2%'>
                            <div class="da-card-content">
                                <div class='row'>
                                    <div class='col-md-3'></div>
                                    <div class='col-md-6'>
                                        <p class="text-center" style='font-size: 18px; font-weight: 600; margin-bottom: 1.9%;'> You currently don't have any students in this class </p>
                                        <p class="text-center" style='font-size: 18px; font-weight: 600; margin-bottom: 1.9%;'> To add students use the button below </p>
                                        <p class='text-center'> <a href='add-student.php' class="btn btn-primary btn-lg"> Add Students <a> </p>
                                    </div>
                                    <div class='col-md-3'></div>
                                </div>
                            </div>
                        </div>
                    `
            document
                .querySelector("#classStudents")
                .insertAdjacentHTML("afterbegin", students)
        }
        const breadcrumb = `<li class="breadcrumb-item"><a href="index.php">Home</a></li>
							<li class="breadcrumb-item" aria-current="page"><a href='level.php?q=${data.levelRef}'>${data.levelName}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">${data.className}</li>`
        const title = `<h4>${data.className}</h4>`
        document
            .querySelector("#classTitle")
            .insertAdjacentHTML("beforeend", title)
        document
            .querySelector("#classBreadCrumb")
            .insertAdjacentHTML("beforeend", breadcrumb)
    })
}

function renderStudentInfo() {
    let a = location;
    let b = a.toString()
    let c = b.split('?q=');
    let request = c[1];
    fetch("api/userdetails/student-profile.php?q="+request+"")
    .then(response => {
        return response.json()
    })
    .then(data => {
        console.log(data)
        const picture = data.map(item => {
            return `
                <img src='${item.picture}' alt='' class='avatar-photo' style='height: 162px; width: 100%;'>
            `
        })
        const nameOfStudent = data.map(item => {
            return `
                <h5 class='text-center h5 mb-0'>${item.name}</h5>
            `
        })
        const studentProfile = data.map(item => {
            return `
                <li>
                    <span>ID Number:</span>
                    ${item.idNumber}
                </li>
                <li>
                    <span>Age:</span>
                    ${item.age}
                </li>
                <li>
                    <span>Email Address:</span>
                    ${item.email}
                </li>
                <li>
                    <span>Phone Number:</span>
                    ${item.phoneNumber}
                </li>
                <li>
                    <span>Gender:</span>
                    ${item.gender}
                </li>
                <li>
                    <span>Address:</span>
                    ${item.address}
                </li>
                <li>
                    <span>Next of Keen:</span>
                    ${item.nextOfKeen}
                </li>
                <li>
                    <span>Next of Keen Number:</span>
                    ${item.nextOfKeenNumber}
                </li>
                <li>
                    <span>Relationsip to Next of Keen:</span>
                    ${item.relationToNextOfKeen}
                </li>
            `
        })
        const studentInfo = data.map(item => {
            return `
                <li class="weight-500 col-md-6">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input name='fullName' value='${item.name}' placeholder='${item.name}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input name='age' value='${item.age}' placeholder='${item.age}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name='phoneNumber' value='${item.phoneNumber}' placeholder='${item.phoneNumber}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name='address' class="form-control"> ${item.address} </textarea>
                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary" value="Update Information">
                    </div>
                </li>
                <li class="weight-500 col-md-6">
                    <div class="form-group">
                        <label>ID Number</label>
                        <input name='idNumber' value='${item.idNumber}' placeholder='${item.idNumber}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name='email' value='${item.email}' placeholder='${item.email}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="d-flex">
                        ${
                            item.gender.toLowerCase() == "male" ?
                                `
                                <div class="custom-control custom-radio mb-5 mr-20">
                                    <input type="radio" id="customRadio4" name="gender" value='male' class="custom-control-input" checked>
                                    <label class="custom-control-label weight-400" for="customRadio4">Male</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio5" name="gender" value='female' class="custom-control-input">
                                    <label class="custom-control-label weight-400" for="customRadio5">Female</label>
                                </div>
                                `
                            :
                                `
                                <div class="custom-control custom-radio mb-5 mr-20">
                                    <input type="radio" id="customRadio4" name="gender" value='male' class="custom-control-input" checked>
                                    <label class="custom-control-label weight-400" for="customRadio4">Male</label>
                                </div>
                                <div class="custom-control custom-radio mb-5">
                                    <input type="radio" id="customRadio5" name="gender" value='female' class="custom-control-input" checked>
                                    <label class="custom-control-label weight-400" for="customRadio5">Female</label>
                                </div>
                                `
                        }
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Next of Keen</label>
                        <input name='nextOfKeen' value='${item.nextOfKeen}' placeholder='${item.nextOfKeen}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Next of Keen Number</label>
                        <input name='nextOfKeenNumber' value='${item.nextOfKeenNumber}' placeholder='${item.nextOfKeenNumber}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Relationship to Next of Keen</label>
                        <input name='relationshipToNextOfKeen' value='${item.relationToNextOfKeen}' placeholder='${item.relationToNextOfKeen}' class="form-control form-control-lg" type="text">
                    </div>
                </li>
            `
        })
        .join("")
        const breadcrumb = `<li class="breadcrumb-item active" aria-current="page">${data.name}</li>`
        document
            .querySelector("#studentInfo")
            .insertAdjacentHTML("afterbegin", studentProfile)
        document
            .querySelector("#editStudentInfo")
            .insertAdjacentHTML("afterbegin", studentInfo)
        document
            .querySelector("#studentImg")
            .insertAdjacentHTML("beforeend", picture)
        document
            .querySelector("#studentProfileDetails")
            .insertAdjacentHTML("beforeend", nameOfStudent)
    })
}

function renderRegister() {
    let a = location;
    let b = a.toString()
    let c = b.split('?q=');
    let request = c[1];
    fetch("api/register/get-register.php?q=" + request)
    .then(response => {
        return response.json()
    })
    .then(data => {
        console.log(data)
        let count = 0
        if(data.result == 'success'){
            const register = data.registerData.map(item => {
                count += 1
                let a = item.date.split(' ')
                let date  = a[2] + ' ' + a[1] +  ' ' + a[0]
                return `
                <div class="card">
                    <div class="card-header">
                        <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq${count.toString()}">
                            ${
                                date
                            }
                        </button>
                    </div>
                    <div id="faq${count.toString()}" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <div class="card-box">
                                <div class="pb-20">
                                    <table class="table hover multiple-select-row data-table-export nowrap">
                                        <thead>
                                            <tr>
                                                <th class="table-plus datatable-nosort">Name</th>
                                                <th> Class </th>
                                                <th> Status </th>
                                                <th> Arrived At </th>
                                                <th> Left At </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ${
                                                item.students.map(student => {
                                                    return `
                                                    <tr>
                                                        <td class="table-plus"> ${student.name} </td>
                                                        <td> ${student.class}  </td>
                                                        <td>
                                                            ${
                                                                student.status.toLowerCase() == "present" ?
                                                                "Present"
                                                                :
                                                                "Absent"
                                                            }
                                                        </td>
                                                        <td> ${student.arrivedAt} </td>
                                                        <td> ${student.leftAt} </td>
                                                    </tr>
                                                    `
                                                })
                                                .join('')
                                            }
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `
            }).join('')
            document
                .querySelector("#accordion")
                .insertAdjacentHTML("afterbegin", register)
        }else{
            const register = `
                        <div class="da-card" style='width: 100%; margin-bottom: 2%'>
                            <div class="da-card-content">
                                <div class='row'>
                                    <div class='col-md-3'></div>
                                    <div class='col-md-6'>
                                        <p class="text-center" style='font-size: 18px; font-weight: 600; margin-bottom: 1.9%;'> You currently don't have a register for this class </p>
                                        <p class="text-center" style='font-size: 16px; font-weight: 600; margin-bottom: 1.9%;'> To add a register please set the dates the students should come to school </p>
                                        <p class='text-center'> <a href='create-term.php' class="btn btn-primary btn-lg"> Set Dates <a> </p>
                                    </div>
                                    <div class='col-md-3'></div>
                                </div>
                            </div>
                        </div>
                    `
            document
                .querySelector("#accordion")
                .insertAdjacentHTML("afterbegin", register)
        }
        document
            .querySelector("#myName")
            .insertAdjacentHTML("afterbegin", name)
    })
}

function renderSchoolTeachers() {
    fetch("api/userdetails/teachers.php")
    .then(response => {
        return response.json() 
    })
    .then(data => {
        const classes = data.teachers.map(item => {
            return `
                <div class='col-lg-4 col-md-6 col-sm-12 mb-30' style='float: left'>
                    <div class='da-card'>
                        <div class='da-card-photo'>
                            <a href='teacher.php?q=${item.ref}'>
                                <img src='${item.picture}' alt="" style='height: 140px; transform: scale(1.2)'>
                            </a>
                        </div>
                        <a href='teacher.php?q=${item.ref}'>
                            <div class='da-card-content'>
                                <h5 class='h5 mb-10'>${item.name}</h5>
                            </div>
                        </a>
                    </div>
                </div>
            `
        })
        .join('')
        document
            .querySelector('#schoolTeachers')
            .insertAdjacentHTML('afterbegin', classes)
    })
}

function renderSchoolClasses() {
    fetch("api/userdetails/school-classes.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        const classes = data.map(item => {
            return `
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30" style='float: left'>
                    <div class="da-card">
                        <div class="da-card-photo">
                            <a href='class.php?q=${item.ref}'>
                                <img src="${item.picture}" alt="" style='height: 140px; transform: scale(1.2)'>
                            </a>
                        </div>
                        <a href='class.php?q=${item.ref}'>
                            <div class="da-card-content">
                                <h5 class="h5 mb-10">${item.name}</h5>
                                <p class="mb-0"> Class Teacher: ${item.classTeacher}</p>
                            </div>
                        </a>
                    </div>
                </div>
            `
        })
        .join('')
        document
            .querySelector("#schoolClasses")
            .insertAdjacentHTML("afterbegin", classes)
    })
}
function renderSchoolInfo() {
    fetch("api/userdetails/user-details.php")
    .then(response => {
        return response.json()
    })
    .then(data => {
        const schoolInfo =
            `
                <li class="weight-500 col-md-6">
                    <div class="form-group">
                        <label> Name Of School </label>
                        <input name='nameOfSchool' value='${data.name}' placeholder='${data.name}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input name='email' value='${data.email}' placeholder='${data.email}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name='phoneNumber' value='${data.phone}' placeholder='${data.phone}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label> Username </label>
                        <input name='userName' value='${data.userName}' placeholder='${data.userName}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary" value="Update Information">
                    </div>
                </li>
                <li class="weight-500 col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input name='address' class="form-control form-control-lg" placeholder='${data.address}' value='${data.address}'>
                    </div>
                    <div class="form-group">
                        <label> Head/Principal </label>
                        <input name='headName' value='${data.headName}' placeholder='${data.headName}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label> Title </label>
                        <input name='gender' value='${data.gender}' placeholder='${data.gender}' class="form-control form-control-lg" type="text">
                    </div>
                </li>
            `
            const schoolPassword =
            `
                <li class="weight-500 col-md-6">
                    <div class="form-group">
                        <label> Current Password </label>
                        <input name='pass1' placeholder='Current Password' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label> Confirm New Password </label>
                        <input name='pass3' placeholder='Confirm New Password' class="form-control form-control-lg" type="text">
                    </div>
                <li class="weight-500 col-md-6">
                    <div class="form-group">
                        <label> New Password </label>
                        <input name='pass2' class="form-control form-control-lg" placeholder='New Password'>
                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary form-control-lg" value="Change Password">
                    </div>
                </li>
            `
        //const breadcrumb = `<li class="breadcrumb-item active" aria-current="page">${data.name}</li>`
        document
            .querySelector("#editSchoolInfo")
            .insertAdjacentHTML("afterbegin", schoolInfo)
        document
            .querySelector("#editSchoolPass")
            .insertAdjacentHTML("afterbegin", schoolPassword)
    })
}

function renderTeacherInfo() {
    let a = location;
    let b = a.toString()
    let c = b.split('?q=');
    let request = c[1];
    fetch("api/userdetails/teacher-profile.php?q="+request+"")
    .then(response => {
        return response.json()
    })
    .then(data => {
        console.log(data)
        const picture = data.map(item => {
            return `
                <img src='${item.picture}' alt='' class='avatar-photo' style='height: 162px; width: 100%;'>
            `
        })
        const nameOfTeacher = data.map(item => {
            return `
                <h5 class='text-center h5 mb-0'>${item.name}</h5>
            `
        })
        const teacherProfile = data.map(item => {
            return `
                <li>
                    <span>ID Number:</span>
                    ${item.idNumber}
                </li>
                <li>
                    <span>Age:</span>
                    ${item.age}
                </li>
                <li>
                    <span> Class: </span>
                    ${item.class}
                </li>
                <li>
                    <span>Phone Number:</span>
                    ${item.phoneNumber}
                </li>
                <li>
                    <span> Title: </span>
                    ${item.title}
                </li>
                <li>
                    <span>Address:</span>
                    ${item.address}
                </li>
            `
        })
        const teacherInfo = data.map(item => {
            return `
                <li class="weight-500 col-md-6">
                    <div class="form-group d-none">
                        <label> Teacher Ref </label>
                        <input name='teacherRef' value='${item.teacherRef}' placeholder='${item.teacherRef}' class="form-control form-control-lg" type="hidden">
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input name='fullName' value='${item.name}' placeholder='${item.name}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input name='age' value='${item.age}' placeholder='${item.age}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input name='phoneNumber' value='${item.phoneNumber}' placeholder='${item.phoneNumber}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name='address' class="form-control"> ${item.address} </textarea>
                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-primary" value="Update Information">
                    </div>
                </li>
                <li class="weight-500 col-md-6">
                    <div class="form-group">
                        <label>ID Number</label>
                        <input name='idNumber' value='${item.idNumber}' placeholder='${item.idNumber}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label> Title </label>
                        <input name='title' value='${item.title}' placeholder='${item.title}' class="form-control form-control-lg" type="text">
                    </div>
                    <div class="form-group">
                        <label> Class </label>
                        <input name='class' value='${item.class}' placeholder='${item.class}' class="form-control form-control-lg" type="text">
                    </div>
                </li>
            `
        })
        .join("")
        const breadcrumb = `<li class="breadcrumb-item active" aria-current="page">${data.name}</li>`
        document
            .querySelector("#teacherInfo")
            .insertAdjacentHTML("afterbegin", teacherProfile)
        document
            .querySelector("#editTeacherInfo")
            .insertAdjacentHTML("afterbegin", teacherInfo)
        document
            .querySelector("#teacherImg")
            .insertAdjacentHTML("beforeend", picture)
        document
            .querySelector("#teacherProfileDetails")
            .insertAdjacentHTML("beforeend", nameOfTeacher)
    })
}

renderHeaderMenu()
renderTermState()
renderLevels()
renderLevelsOnAddClass()
renderClasses()
renderTeachersOnAddClass()
renderClassesOnAddStudent()
renderClassStudents()
renderStudentInfo()
renderRegister()
renderSchoolTeachers()
renderSchoolClasses()
renderSchoolInfo()
renderTeacherInfo()