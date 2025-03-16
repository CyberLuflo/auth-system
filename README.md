

### **English Description**

#### **Overview**
The `auth-system` is a secure authentication system built using PHP, MySQL, and PHPMailer. It allows users to register, log in, and recover their passwords securely. The system follows best practices for security, such as password hashing, token-based password recovery, and secure email communication.

#### **Key Features**
1. **User Registration**:
   - Users can register by providing their name, email, and password.
   - Passwords are securely hashed using the `password_hash()` function before being stored in the database.

2. **User Login**:
   - Users can log in using their email and password.
   - The system verifies the password using `password_verify()` to ensure security.

3. **Password Recovery**:
   - Users can request a password reset by providing their email.
   - A unique recovery token is generated and stored in the database.
   - An email with a recovery link is sent to the user's email address using PHPMailer.

4. **Password Reset**:
   - Users can reset their password by clicking the recovery link in the email.
   - The system validates the recovery token and allows the user to set a new password.

5. **Security**:
   - Passwords are hashed using the `PASSWORD_BCRYPT` algorithm.
   - Recovery tokens are securely generated using `random_bytes()` and stored in the database.
   - PHPMailer is configured to use SMTP with TLS encryption for secure email communication.

6. **Error Handling**:
   - The system handles errors gracefully, providing clear feedback to users in case of invalid tokens, database errors, or email sending failures.

#### **File Structure**
- **`model/db_conn.php`**: Handles the database connection using PDO.
- **`control/register.php`**: Processes user registration.
- **`control/login.php`**: Handles user login.
- **`control/recovery.php`**: Manages password recovery and sends recovery emails.
- **`control/reset_password.php`**: Handles password reset using a recovery token.
- **`view/register.html`**: Registration form.
- **`view/login.html`**: Login form.
- **`view/recovery.html`**: Password recovery form.
- **`view/dashboard.html`**: User dashboard (protected area).

#### **Technologies Used**
- **PHP**: Backend logic and database interaction.
- **MySQL**: Database for storing user information.
- **PHPMailer**: Sending recovery emails via SMTP.
- **HTML/CSS**: Frontend forms and styling.
- **JavaScript**: Basic interactivity (optional).

---

### **Descripción en Español**

#### **Resumen**
El `auth-system` es un sistema de autenticación seguro desarrollado con PHP, MySQL y PHPMailer. Permite a los usuarios registrarse, iniciar sesión y recuperar sus contraseñas de manera segura. El sistema sigue las mejores prácticas de seguridad, como el hashing de contraseñas, la recuperación de contraseñas basada en tokens y la comunicación segura por correo electrónico.

#### **Características Principales**
1. **Registro de Usuarios**:
   - Los usuarios pueden registrarse proporcionando su nombre, correo electrónico y contraseña.
   - Las contraseñas se almacenan de forma segura usando la función `password_hash()`.

2. **Inicio de Sesión**:
   - Los usuarios pueden iniciar sesión con su correo electrónico y contraseña.
   - El sistema verifica la contraseña usando `password_verify()` para garantizar la seguridad.

3. **Recuperación de Contraseña**:
   - Los usuarios pueden solicitar un restablecimiento de contraseña proporcionando su correo electrónico.
   - Se genera un token de recuperación único que se almacena en la base de datos.
   - Se envía un correo electrónico con un enlace de recuperación usando PHPMailer.

4. **Restablecimiento de Contraseña**:
   - Los usuarios pueden restablecer su contraseña haciendo clic en el enlace de recuperación en el correo electrónico.
   - El sistema valida el token de recuperación y permite al usuario establecer una nueva contraseña.

5. **Seguridad**:
   - Las contraseñas se hashean usando el algoritmo `PASSWORD_BCRYPT`.
   - Los tokens de recuperación se generan de forma segura usando `random_bytes()` y se almacenan en la base de datos.
   - PHPMailer se configura para usar SMTP con cifrado TLS para una comunicación segura por correo electrónico.

6. **Manejo de Errores**:
   - El sistema maneja errores de manera adecuada, proporcionando retroalimentación clara a los usuarios en caso de tokens inválidos, errores de base de datos o fallos en el envío de correos.

#### **Estructura de Archivos**
- **`model/db_conn.php`**: Maneja la conexión a la base de datos usando PDO.
- **`control/register.php`**: Procesa el registro de usuarios.
- **`control/login.php`**: Maneja el inicio de sesión de usuarios.
- **`control/recovery.php`**: Gestiona la recuperación de contraseñas y envía correos de recuperación.
- **`control/reset_password.php`**: Maneja el restablecimiento de contraseñas usando un token de recuperación.
- **`view/register.html`**: Formulario de registro.
- **`view/login.html`**: Formulario de inicio de sesión.
- **`view/recovery.html`**: Formulario de recuperación de contraseña.
- **`view/dashboard.html`**: Panel de usuario (área protegida).

#### **Tecnologías Utilizadas**
- **PHP**: Lógica del backend e interacción con la base de datos.
- **MySQL**: Base de datos para almacenar la información de los usuarios.
- **PHPMailer**: Envío de correos de recuperación mediante SMTP.
- **HTML/CSS**: Formularios frontend y estilos.
- **JavaScript**: Interactividad básica (opcional).

