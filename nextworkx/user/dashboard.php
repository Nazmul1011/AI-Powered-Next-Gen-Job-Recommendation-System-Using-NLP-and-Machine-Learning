<?php
session_start();
include('../includes/db.php');
include('../includes/header_jobseeker.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'job_seeker') {
  header("Location: ../login.php");
  exit();
}

$user_id = $_SESSION['user_id'];
$jobseeker_name = $_SESSION['fullname'] ?? 'Job Seeker';

// Fetch total applied jobs count
$stmt1 = $conn->prepare("SELECT COUNT(*) FROM applied_jobs WHERE job_seeker_id = :user_id");
$stmt1->execute([':user_id' => $user_id]);
$applied_jobs_count = $stmt1->fetchColumn();

// Fetch total saved jobs count (NEW)
$stmt2 = $conn->prepare("SELECT COUNT(*) FROM saved_jobs WHERE job_seeker_id = :user_id");
$stmt2->execute([':user_id' => $user_id]);
$saved_jobs_count = $stmt2->fetchColumn();

// Fetch recent 4 applied jobs
$stmt3 = $conn->prepare("
    SELECT jobs.job_id, jobs.job_title, jobs.city, jobs.min_salary, jobs.max_salary, jobs.job_level, jobs.recruiter_id, applied_jobs.applied_at, applied_jobs.status, company_profiles.logo
    FROM applied_jobs
    JOIN jobs ON applied_jobs.job_id = jobs.job_id
    LEFT JOIN company_profiles ON jobs.recruiter_id = company_profiles.recruiter_id
    WHERE applied_jobs.job_seeker_id = :user_id
    ORDER BY applied_jobs.applied_at DESC
    LIMIT 4
");
$stmt3->execute([':user_id' => $user_id]);
$recent_jobs = $stmt3->fetchAll(PDO::FETCH_ASSOC);
?>

<link rel="stylesheet" href="../assets/css/jobseeker_style.css">

<div class="container">
  <h1 class="dashboard-title">Welcome, <?= htmlspecialchars($jobseeker_name) ?></h1>
  <p class="subtitle">Manage your applications, saved jobs, and update your profile.</p>

  <div class="dashboard-cards">
    <div class="card orange-card">
      <h3>Applied Jobs</h3>
      <p><strong><?= $applied_jobs_count ?></strong> Total</p>
      <a href="applied_jobs.php" class="dashboard-btn">View All</a>
    </div>

    <div class="card yellow-card">
      <h3>Favorite Jobs</h3>
      <p><strong><?= $saved_jobs_count ?></strong> Saved</p> <!-- ✅ Dynamic now -->
      <a href="bookmarks_job.php" class="dashboard-btn">Favorites</a>
    </div>

    <div class="card green-card">
      <h3>Job Alerts</h3>
      <p><strong>574</strong> Alerts</p> <!-- Static for now -->
      <a href="#" class="dashboard-btn">Manage</a>
    </div>

    <div class="card orange-card">
      <h3>Profile</h3>
      <p>Edit your details</p>
      <a href="profile.php" class="dashboard-btn">Update Profile</a>
    </div>
  </div>

  <div class="profile-reminder">
    <div class="avatar">
      <div class="fallback-avatar"><i class="fas fa-user"></i></div>
    </div>
    <div class="reminder-text">
      <h4>Your profile is incomplete</h4>
      <p>Complete your profile to unlock better job matches and build your custom resume.</p>
    </div>
    <a href="step1_personal.php" class="reminder-btn">Complete Now</a>
  </div>

  <div class="recent-applied">
    <div class="section-header">
      <h3>Recently Applied</h3>
      <a href="applied_jobs.php" class="view-all-link">View all →</a>
    </div>

    <div class="applied-jobs-table">
      <div class="table-header">
        <span>Job</span>
        <span>Date Applied</span>
        <span>Status</span>
        <span>Action</span>
      </div>

      <?php if (count($recent_jobs) > 0): ?>
        <?php foreach ($recent_jobs as $job): ?>
          <div class="table-row">
            <div class="job-info">
              <?php
                if (!empty($job['logo'])) {
                    $logo_path = '../uploads/company/' . htmlspecialchars($job['logo']);
                } else {
                    $logo_path = '../assets/img/logo-default.png';
                }
              ?>
              <img src="<?= $logo_path ?>" alt="Company Logo" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; background: #eee;">
              <div>
                <strong><?= htmlspecialchars($job['job_title']) ?></strong>
                <div class="job-meta">
                  <span><?= htmlspecialchars($job['city']) ?></span> · 
                  <span><?= htmlspecialchars($job['min_salary']) ?>-<?= htmlspecialchars($job['max_salary']) ?></span> · 
                  <span class="tag"><?= htmlspecialchars($job['job_level']) ?></span>
                </div>
              </div>
            </div>
            <span><?= date('M d, Y', strtotime($job['applied_at'])) ?></span>
            <span class="status <?= strtolower($job['status']) ?>"><?= $job['status'] ?></span>
            <a href="job_details.php?job_id=<?= $job['job_id'] ?>" class="view-btn">View Details</a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p style="margin-top: 20px; color: #777;">You haven't applied for any jobs yet.</p>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php include('../includes/footer_jobseeker.php'); ?>
