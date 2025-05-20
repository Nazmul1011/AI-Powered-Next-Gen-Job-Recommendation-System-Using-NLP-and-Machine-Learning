<<<<<<< HEAD
# NextWorkX – AI-Based Job Recommendation Platform

NextWorkX is a smart job recommendation system for both freshers and experienced professionals. It connects job seekers and recruiters through a web platform that uses machine learning to suggest jobs based on resumes, skills, and profile data.

---

## 🔧 Tools & Technologies

- **Frontend:** HTML, CSS, JavaScript, Tailwind CSS  
- **Backend:** PHP  
- **Database:** MySQL  
- **Machine Learning:** Python (Scikit-learn, spaCy, TF-IDF)  
- **Local Server:** XAMPP  
- **Version Control:** Git & GitHub  

---

## ✅ Features

### 👤 Job Seekers
- Register, login, and complete a multi-step profile
- Upload resumes and receive job recommendations
- Apply for jobs and track applications
- Save/bookmark jobs
- View profile completion status

### 🏢 Recruiters
- Register and complete company profile in steps
- Post new jobs and manage existing ones
- View matched applicants based on keywords

### 🔒 Admin
- View and manage all users, jobs, and applications

---

## 📁 Project Structure

```
nextworkx/
├── index.php
├── register.php / login.php
├── /user/                 # Job seeker interface
├── /employer/             # Recruiter interface
├── /admin/                # Admin panel
├── /uploads/              # Resume & images
├── /assets/               # CSS & JS
├── /includes/             # DB & layout files
└── /recommend/            # Python ML logic
```

---

## ⚙️ How It Works

1. Users complete their profile or upload a resume.
2. Resume content and job descriptions are processed using TF-IDF.
3. A Python script matches users with jobs based on similarity.
4. Matched jobs are ranked and shown to the user.
5. Recruiters see applicants who are a good fit.

---

## 🚀 Getting Started

### Prerequisites
- PHP 8+
- MySQL
- Python 3.8+
- XAMPP / Local server
- pip (for Python dependencies)

### Setup Instructions

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/nextworkx.git
   ```

2. Import the `nextworkx_db.sql` file into MySQL.

3. Update `includes/db.php` with your database credentials.

4. Start Apache & MySQL from XAMPP. Place project inside `htdocs`.

5. Navigate to the project folder in the browser:
   ```
   http://localhost/nextworkx/
   ```

6. Install Python dependencies:
   ```
   pip install -r recommend/requirements.txt
   ```

---

## 🧪 Demo Accounts

### Recruiter
- **Email:** google.hr@company.com  
- **Password:** test123

### Job Seeker
- **Email:** student01@gmail.com  
- **Password:** test123

---

## 🤖 Machine Learning

- TF-IDF based keyword matching
- Resume and job description vectorization
- Cosine similarity used to rank jobs

*Future versions may use BERT for deeper context understanding.*

---

## 🔐 Security

- Passwords stored using PHP’s `password_hash()`
- Form validations for input and uploads
- File size/type checks for resumes

---

## 🚧 Future Work

- BERT-powered job recommendations
- Resume parsing with NLP
- Google/LinkedIn login support
- Notifications and interview tracking
- Mobile app version of the platform

---

## 📚 References

- S. Panchasara, R. K. Gupta and A. Sharma, "AI Based Job Recommendation System using BERT," 2023 7th International Conference On Computing.  
- V. S. Pendyala, N. Atrey, T. Aggarwal and S. Goyal, "Enhanced Algorithmic Job Matching using NLP and ML," 2022.  
- E. Abdollahnejad, M. Kalman and B. H. Far, "A Deep Learning BERT-Based Approach to Person-Job Fit," 2021.  
- S. Jogi et al., "NLP Unleashed: Dynamic Recruitment Platforms," 2024.  
- A. Pradhan, "Employee–Job Profile Matching Challenges Using AI/ML," 2024.

---

## 📄 License

This project is for academic and educational use only.

---
=======
# AI-Powered-Next-Gen-Job-Recommendation-System-Using-NLP-and-Machine-Learning
>>>>>>> f3c77d1 (Project Report)
