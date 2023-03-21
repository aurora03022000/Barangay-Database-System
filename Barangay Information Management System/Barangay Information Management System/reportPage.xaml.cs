using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;
using MySql.Data.MySqlClient;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for reportPage.xaml
    /// </summary>
    public partial class reportPage : Window
    {

        String selected;
        double fourpsCount, fourpsYesCount, fourpsYesCountTotal, fourpsYesCountTotalWidth, fourpsNoCount, fourpsNoCountTotal, fourpsNoCountTotalWidth, fourpsNACount, fourpsNACountTotal, fourpsNACountTotalWidth;
        double agriculturalFacilityCount, agriculturalFacilityYesCount, agriculturalFacilityYesCountTotal, agriculturalFacilityYesCountTotalWidth, agriculturalFacilityNoCount, agriculturalFacilityNoCountTotal, agriculturalFacilityNoCountTotalWidth, agriculturalFacilityNACount, agriculturalFacilityNACountTotal, agriculturalFacilityNACountTotalWidth;
        double animalCount, animalYesCount, animalYesCountTotal, animalYesCountTotalWidth, animalNoCount, animalNoCountTotal, animalNoCountTotalWidth, animalNACount, animalNACountTotal, animalNACountTotalWidth;
        double backgroundCount, backgroundYesCount, backgroundYesCountTotal, backgroundYesCountTotalWidth, backgroundNoCount, backgroundNoCountTotal, backgroundNoCountTotalWidth, backgroundNACount, backgroundNACountTotal, backgroundNACountTotalWidth;
        double blindDrainageCount, blindDrainageYesCount, blindDrainageYesCountTotal, blindDrainageYesCountTotalWidth, blindDrainageNoCount, blindDrainageNoCountTotal, blindDrainageNoCountTotalWidth, blindDrainageNACount, blindDrainageNACountTotal, blindDrainageNACountTotalWidth;
        double breastFeedingCount, breastFeedingYesCount, breastFeedingYesCountTotal, breastFeedingYesCountTotalWidth, breastFeedingNoCount, breastFeedingNoCountTotal, breastFeedingNoCountTotalWidth, breastFeedingNACount, breastFeedingNACountTotal, breastFeedingNACountTotalWidth;
        double dependencyCount, dependencyDependentCount, dependencyDependentCountTotal, dependencyDependentCountTotalWidth, dependencyIndependentCount, dependencyIndependentCountTotal, dependencyIndependentCountTotalWidth;
        double dwtwbCount, dwtwbYesCount, dwtwbYesCountTotal, dwtwbYesCountTotalWidth, dwtwbNoCount, dwtwbNoCountTotal, dwtwbNoCountTotalWidth, dwtwbNACount, dwtwbNACountTotal, dwtwbNACountTotalWidth;
        double familyPlanningCount, familyPlanningYesCount, familyPlanningYesCountTotal, familyPlanningYesCountTotalWidth, familyPlanningNoCount, familyPlanningNoCountTotal, familyPlanningNoCountTotalWidth, familyPlanningNACount, familyPlanningNACountTotal, familyPlanningNACountTotalWidth;
        //double garbageDisposalCount, garbageDisposalYesCount, garbageDisposalYesCountTotal, garbageDisposalYesCountTotalWidth, garbageDisposalNoCount, garbageDisposalNoCountTotal, garbageDisposalNoCountTotalWidth, garbageDisposalNACount, garbageDisposalNACountTotal, garbageDisposalNACountTotalWidth;

        double educationCount, educationNotAttendedCount, educationNotAttendedCountTotal, educationNotAttendedCountTotalWidth, educationALSCount, educationALSCountTotal, educationALSCountTotalWidth, educationElementaryLevelCount, educationElementaryLevelCountTotal, educationElementaryLevelCountTotalWidth;
        double educationElementaryGraduateCount, educationElementaryGraduateCountTotal, educationElementaryGraduateCountTotalWidth, educationHighSchoolLevelCount, educationHighSchoolLevelCountTotal, educationHighSchoolLevelCountTotalWidth, educationHighSchoolGraduateCount, educationHighSchoolGraduateCountTotal, educationHighSchoolGraduateCountTotalWidth;
        double educationSeniorHighSchoolLevelCount, educationSeniorHighSchoolLevelCountTotal, educationSeniorHighSchoolLevelCountTotalWidth, educationSeniorHighSchoolGraduateCount, educationSeniorHighSchoolGraduateCountTotal, educationSeniorHighSchoolGraduateCountTotalWidth, educationCollegeLevelCount, educationCollegeLevelCountTotal, educationCollegeLevelCountTotalWidth;
        double educationCollegeGraduateCount, educationCollegeGraduateCountTotal, educationCollegeGraduateCountTotalWidth;

        double immunizationCount, immunizationYesCount, immunizationYesCountTotal, immunizationYesCountTotalWidth, immunizationNoCount, immunizationNoCountTotal, immunizationNoCountTotalWidth, immunizationNACount, immunizationNACountTotal, immunizationNACountTotalWidth;
        double ipCount, ipYesCount, ipYesCountTotal, ipYesCountTotalWidth, ipNoCount, ipNoCountTotal, ipNoCountTotalWidth, ipNACount, ipNACountTotal, ipNACountTotalWidth;
        double ntpCount, ntpYesCount, ntpYesCountTotal, ntpYesCountTotalWidth, ntpNoCount, ntpNoCountTotal, ntpNoCountTotalWidth, ntpNACount, ntpNACountTotal, ntpNACountTotalWidth;
        double philhealthCount, philhealthYesCount, philhealthYesCountTotal, philhealthYesCountTotalWidth, philhealthNoCount, philhealthNoCountTotal, philhealthNoCountTotalWidth, philhealthNACount, philhealthNACountTotal, philhealthNACountTotalWidth;
        double pwdCount, pwdYesCount, pwdYesCountTotal, pwdYesCountTotalWidth, pwdNoCount, pwdNoCountTotal, pwdNoCountTotalWidth, pwdNACount, pwdNACountTotal, pwdNACountTotalWidth;
        double sexCount, sexMaleCount, sexMaleCountTotal, sexMaleCountTotalWidth, sexFemaleCount, sexFemaleCountTotal, sexFemaleCountTotalWidth;
        double smookingCount, smookingYesCount, smookingYesCountTotal, smookingYesCountTotalWidth, smookingNoCount, smookingNoCountTotal, smookingNoCountTotalWidth, smookingNACount, smookingNACountTotal, smookingNACountTotalWidth;
        double wraCount, wraYesCount, wraYesCountTotal, wraYesCountTotalWidth, wraNoCount, wraNoCountTotal, wraNoCountTotalWidth, wraNACount, wraNACountTotal, wraNACountTotalWidth;
        double suffixCount, suffixJrCount, suffixJrCountTotal, suffixJrCountTotalWidth, suffixSrCount, suffixSrCountTotal, suffixSrCountTotalWidth, suffixICount, suffixICountTotal, suffixICountTotalWidth, suffixIICount, suffixIICountTotal, suffixIICountTotalWidth, suffixIIICount, suffixIIICountTotal, suffixIIICountTotalWidth;

        double finalWidth;

        double defaultWidth;

        public reportPage()
        {
            InitializeComponent();

            reports_category_combobox.Text = "4Ps";
            MaxHeight = SystemParameters.MaximizedPrimaryScreenHeight;
            MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

        }

        private void reports_category_combobox_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            selected = (((sender as ComboBox).SelectedValue) as ComboBoxItem).Content.ToString();

            if (selected == "4Ps")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Visible;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE fourps != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        fourpsCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        fourpsCountLabel.Content = fourpsCount;
                        fourpsCategoryLabel.Content = "4Ps";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE fourps = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        fourpsYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        fourpsYesCountTotal = (fourpsYesCount * 100) / fourpsCount;
                        fourpsYesCountTotalWidth = (finalWidth * fourpsYesCountTotal) / 100;

                        fourpsYesLabel.Width = fourpsYesCountTotalWidth;
                        fourpsYesLabel.Content = fourpsYesCount + " (" + fourpsYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE fourps = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        fourpsNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        fourpsNoCountTotal = (fourpsNoCount * 100) / fourpsCount;
                        fourpsNoCountTotalWidth = (finalWidth * fourpsNoCountTotal) / 100;

                        fourpsNoLabel.Width = fourpsNoCountTotalWidth;
                        fourpsNoLabel.Content = fourpsNoCount + " (" + fourpsNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE fourps = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        fourpsNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        fourpsNACountTotal = (fourpsNACount * 100) / fourpsCount;
                        fourpsNACountTotalWidth = (finalWidth * fourpsNACountTotal) / 100;

                        fourpsNALabel.Width = fourpsNACountTotalWidth;
                        fourpsNALabel.Content = fourpsNACount + " (" + fourpsNACountTotal + "%)";

                        sqlConnection.Close();
                    }
                }
            }


            else if (selected == "Agricultural Facility")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Visible;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE agricultural_facilities != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        agriculturalFacilityCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        agriculturalFacilityCountLabel.Content = agriculturalFacilityCount;
                        agriculturalFacilityCategoryLabel.Content = "Agricultural Facility";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE agricultural_facilities = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        agriculturalFacilityYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        agriculturalFacilityYesCountTotal = (agriculturalFacilityYesCount * 100) / agriculturalFacilityCount;
                        agriculturalFacilityYesCountTotalWidth = (finalWidth * agriculturalFacilityYesCountTotal) / 100;

                        agriculturalFacilityYesLabel.Width = agriculturalFacilityYesCountTotalWidth;
                        agriculturalFacilityYesLabel.Content = agriculturalFacilityYesCount + " (" + agriculturalFacilityYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE agricultural_facilities = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        agriculturalFacilityNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        agriculturalFacilityNoCountTotal = (agriculturalFacilityNoCount * 100) / agriculturalFacilityCount;
                        agriculturalFacilityNoCountTotalWidth = (finalWidth * agriculturalFacilityNoCountTotal) / 100;

                        agriculturalFacilityNoLabel.Width = agriculturalFacilityNoCountTotalWidth;
                        agriculturalFacilityNoLabel.Content = agriculturalFacilityNoCount + " (" + agriculturalFacilityNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE agricultural_facilities = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        agriculturalFacilityNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        agriculturalFacilityNACountTotal = (agriculturalFacilityNACount * 100) / agriculturalFacilityCount;
                        agriculturalFacilityNACountTotalWidth = (finalWidth * agriculturalFacilityNACountTotal) / 100;

                        agriculturalFacilityNALabel.Width = agriculturalFacilityNACountTotalWidth;
                        agriculturalFacilityNALabel.Content = agriculturalFacilityNACount + " (" + agriculturalFacilityNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Animals/Pet")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Visible;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE animals != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        animalCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        animalCountLabel.Content = animalCount;
                        animalCategoryLabel.Content = "Animals/Pet";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE animals = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        animalYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        animalYesCountTotal = (animalYesCount * 100) / animalCount;
                        animalYesCountTotalWidth = (finalWidth * animalYesCountTotal) / 100;

                        animalYesLabel.Width = animalYesCountTotalWidth;
                        animalYesLabel.Content = animalYesCount + " (" + animalYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE animals = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        animalNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        animalNoCountTotal = (animalNoCount * 100) / animalCount;
                        animalNoCountTotalWidth = (finalWidth * animalNoCountTotal) / 100;

                        animalNoLabel.Width = animalNoCountTotalWidth;
                        animalNoLabel.Content = animalNoCount + " (" + animalNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE animals = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        animalNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        animalNACountTotal = (animalNACount * 100) / animalCount;
                        animalNACountTotalWidth = (finalWidth * animalNACountTotal) / 100;

                        animalNALabel.Width = animalNACountTotalWidth;
                        animalNALabel.Content = animalNACount + " (" + animalNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Background Gardening")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Visible;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE background_gardening != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        backgroundCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        backgroundCountLabel.Content = backgroundCount;
                        backgroundCategoryLabel.Content = "Background Gardening";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE background_gardening = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        backgroundYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        backgroundYesCountTotal = (backgroundYesCount * 100) / backgroundCount;
                        backgroundYesCountTotalWidth = (finalWidth * backgroundYesCountTotal) / 100;

                        backgroundYesLabel.Width = backgroundYesCountTotalWidth;
                        backgroundYesLabel.Content = backgroundYesCount + " (" + backgroundYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE background_gardening = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        backgroundNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        backgroundNoCountTotal = (backgroundNoCount * 100) / backgroundCount;
                        backgroundNoCountTotalWidth = (finalWidth * backgroundNoCountTotal) / 100;

                        backgroundNoLabel.Width = backgroundNoCountTotalWidth;
                        backgroundNoLabel.Content = backgroundNoCount + " (" + backgroundNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE background_gardening = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        backgroundNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        backgroundNACountTotal = (backgroundNACount * 100) / backgroundCount;
                        backgroundNACountTotalWidth = (finalWidth * backgroundNACountTotal) / 100;

                        backgroundNALabel.Width = backgroundNACountTotalWidth;
                        backgroundNALabel.Content = backgroundNACount + " (" + backgroundNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Blind Drainage")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Visible;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE blind_drainage != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        blindDrainageCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        blindDrainageCountLabel.Content = blindDrainageCount;
                        blindDrainageCategoryLabel.Content = "Blind Drainage";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE blind_drainage = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        blindDrainageYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        blindDrainageYesCountTotal = (blindDrainageYesCount * 100) / blindDrainageCount;
                        blindDrainageYesCountTotalWidth = (finalWidth * blindDrainageYesCountTotal) / 100;

                        blindDrainageYesLabel.Width = blindDrainageYesCountTotalWidth;
                        blindDrainageYesLabel.Content = blindDrainageYesCount + " (" + blindDrainageYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE blind_drainage = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        blindDrainageNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        blindDrainageNoCountTotal = (blindDrainageNoCount * 100) / blindDrainageCount;
                        blindDrainageNoCountTotalWidth = (finalWidth * blindDrainageNoCountTotal) / 100;

                        blindDrainageNoLabel.Width = blindDrainageNoCountTotalWidth;
                        blindDrainageNoLabel.Content = blindDrainageNoCount + " (" + blindDrainageNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE blind_drainage = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        blindDrainageNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        blindDrainageNACountTotal = (blindDrainageNACount * 100) / blindDrainageCount;
                        blindDrainageNACountTotalWidth = (finalWidth * blindDrainageNACountTotal) / 100;

                        blindDrainageNALabel.Width = blindDrainageNACountTotalWidth;
                        blindDrainageNALabel.Content = blindDrainageNACount + " (" + blindDrainageNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Breast Feeding")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Visible;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE breast_feeding != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        breastFeedingCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        breastFeedingCountLabel.Content = breastFeedingCount;
                        breastFeedingCategoryLabel.Content = "Breast Feeding";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE breast_feeding = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        breastFeedingYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        breastFeedingYesCountTotal = (breastFeedingYesCount * 100) / breastFeedingCount;
                        breastFeedingYesCountTotalWidth = (finalWidth * breastFeedingYesCountTotal) / 100;

                        breastFeedingYesLabel.Width = breastFeedingYesCountTotalWidth;
                        breastFeedingYesLabel.Content = breastFeedingYesCount + " (" + breastFeedingYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE breast_feeding = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        breastFeedingNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        breastFeedingNoCountTotal = (breastFeedingNoCount * 100) / breastFeedingCount;
                        breastFeedingNoCountTotalWidth = (finalWidth * breastFeedingNoCountTotal) / 100;

                        breastFeedingNoLabel.Width = breastFeedingNoCountTotalWidth;
                        breastFeedingNoLabel.Content = breastFeedingNoCount + " (" + breastFeedingNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE breast_feeding = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        breastFeedingNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        breastFeedingNACountTotal = (breastFeedingNACount * 100) / breastFeedingCount;
                        breastFeedingNACountTotalWidth = (finalWidth * breastFeedingNACountTotal) / 100;

                        breastFeedingNALabel.Width = breastFeedingNACountTotalWidth;
                        breastFeedingNALabel.Content = breastFeedingNACount + " (" + breastFeedingNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Dependency")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 281;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Visible;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE dependency != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        dependencyCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        dependencyCountLabel.Content = dependencyCount;
                        dependencyCategoryLabel.Content = "Dependency";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE dependency = 'Dependent'", sqlConnection))
                    {
                        sqlConnection.Open();

                        dependencyDependentCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        dependencyDependentCountTotal = (dependencyDependentCount * 100) / dependencyCount;
                        dependencyDependentCountTotalWidth = (finalWidth * dependencyDependentCountTotal) / 100;

                        dependencyDependentLabel.Width = dependencyDependentCountTotalWidth;
                        dependencyDependentLabel.Content = dependencyDependentCount + " (" + dependencyDependentCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE dependency = 'Independent'", sqlConnection))
                    {
                        sqlConnection.Open();

                        dependencyIndependentCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        dependencyIndependentCountTotal = (dependencyIndependentCount * 100) / dependencyCount;
                        dependencyIndependentCountTotalWidth = (finalWidth * dependencyIndependentCountTotal) / 100;

                        dependencyIndependentLabel.Width = dependencyIndependentCountTotalWidth;
                        dependencyIndependentLabel.Content = dependencyIndependentCount + " (" + dependencyIndependentCountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Direct Waste to Water Bodies")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Visible;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE direct_waste_to_water_bodies != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        dwtwbCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        dwtwbCountLabel.Content = dwtwbCount;
                        dwtwbCategoryLabel.Content = "Direct Waste to Water Bodies";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE direct_waste_to_water_bodies = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        dwtwbYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        dwtwbYesCountTotal = (dwtwbYesCount * 100) / dwtwbCount;
                        dwtwbYesCountTotalWidth = (finalWidth * dwtwbYesCountTotal) / 100;

                        dwtwbYesLabel.Width = dwtwbYesCountTotalWidth;
                        dwtwbYesLabel.Content = dwtwbYesCount + " (" + dwtwbYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE direct_waste_to_water_bodies = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        dwtwbNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        dwtwbNoCountTotal = (dwtwbNoCount * 100) / dwtwbCount;
                        dwtwbNoCountTotalWidth = (finalWidth * dwtwbNoCountTotal) / 100;

                        dwtwbNoLabel.Width = dwtwbNoCountTotalWidth;
                        dwtwbNoLabel.Content = dwtwbNoCount + " (" + dwtwbNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE direct_waste_to_water_bodies = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        dwtwbNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        dwtwbNACountTotal = (dwtwbNACount * 100) / dwtwbCount;
                        dwtwbNACountTotalWidth = (finalWidth * dwtwbNACountTotal) / 100;

                        dwtwbNALabel.Width = dwtwbNACountTotalWidth;
                        dwtwbNALabel.Content = dwtwbNACount + " (" + dwtwbNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Family Planning")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Visible;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE family_planning != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        familyPlanningCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        familyPlanningCountLabel.Content = familyPlanningCount;
                        familyPlanningCategoryLabel.Content = "Family Planning";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE family_planning = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        familyPlanningYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        familyPlanningYesCountTotal = (familyPlanningYesCount * 100) / familyPlanningCount;
                        familyPlanningYesCountTotalWidth = (finalWidth * familyPlanningYesCountTotal) / 100;

                        familyPlanningYesLabel.Width = familyPlanningYesCountTotalWidth;
                        familyPlanningYesLabel.Content = familyPlanningYesCount + " (" + familyPlanningYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE family_planning = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        familyPlanningNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        familyPlanningNoCountTotal = (familyPlanningNoCount * 100) / familyPlanningCount;
                        familyPlanningNoCountTotalWidth = (finalWidth * familyPlanningNoCountTotal) / 100;

                        familyPlanningNoLabel.Width = familyPlanningNoCountTotalWidth;
                        familyPlanningNoLabel.Content = familyPlanningNoCount + " (" + familyPlanningNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE family_planning = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        familyPlanningNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        familyPlanningNACountTotal = (familyPlanningNACount * 100) / familyPlanningCount;
                        familyPlanningNACountTotalWidth = (finalWidth * familyPlanningNACountTotal) / 100;

                        familyPlanningNALabel.Width = familyPlanningNACountTotalWidth;
                        familyPlanningNALabel.Content = familyPlanningNACount + " (" + familyPlanningNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            /* else if (selected == "Garbage Disposal")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                garbageDisposalGrid.Visibility = Visibility.Visible;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE garbage_disposal != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        garbageDisposalCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        garbageDisposalCountLabel.Content = garbageDisposalCount;
                        garbageDisposalCategoryLabel.Content = "Garbage Disposal";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE garbage_disposal = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        garbageDisposalYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        garbageDisposalYesCountTotal = (garbageDisposalYesCount * 100) / garbageDisposalCount;
                        garbageDisposalYesCountTotalWidth = (finalWidth * garbageDisposalYesCountTotal) / 100;

                        garbageDisposalYesLabel.Width = garbageDisposalYesCountTotalWidth;
                        garbageDisposalYesLabel.Content = garbageDisposalYesCount + " (" + garbageDisposalYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE garbage_disposal = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        garbageDisposalNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        garbageDisposalNoCountTotal = (garbageDisposalNoCount * 100) / garbageDisposalCount;
                        garbageDisposalNoCountTotalWidth = (finalWidth * garbageDisposalNoCountTotal) / 100;

                        garbageDisposalNoLabel.Width = garbageDisposalNoCountTotalWidth;
                        garbageDisposalNoLabel.Content = garbageDisposalNoCount + " (" + garbageDisposalNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE garbage_disposal = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        garbageDisposalNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        garbageDisposalNACountTotal = (garbageDisposalNACount * 100) / garbageDisposalCount;
                        garbageDisposalNACountTotalWidth = (finalWidth * garbageDisposalNACountTotal) / 100;

                        garbageDisposalNALabel.Width = garbageDisposalNACountTotalWidth;
                        garbageDisposalNALabel.Content = garbageDisposalNACount + " (" + garbageDisposalNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            } */

            else if (selected == "Highest Educational Attainment")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 390;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Visible;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationCountLabel.Content = educationCount;
                        educationCategoryLabel.Content = "Highest Educational Attainment";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'Not attended'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationNotAttendedCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationNotAttendedCountTotal = (educationNotAttendedCount * 100) / educationCount;
                        educationNotAttendedCountTotalWidth = (finalWidth * educationNotAttendedCountTotal) / 100;

                        educationNotAttendedLabel.Width = educationNotAttendedCountTotalWidth;
                        educationNotAttendedLabel.Content = educationNotAttendedCount + " (" + educationNotAttendedCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'ALS'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationALSCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationALSCountTotal = (educationALSCount * 100) / educationCount;
                        educationALSCountTotalWidth = (finalWidth * educationALSCountTotal) / 100;

                        educationALSLabel.Width = educationALSCountTotalWidth;
                        educationALSLabel.Content = educationALSCount + " (" + educationALSCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'Elementary Level'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationElementaryLevelCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationElementaryLevelCountTotal = (educationElementaryLevelCount * 100) / educationCount;
                        educationElementaryLevelCountTotalWidth = (finalWidth * educationElementaryLevelCountTotal) / 100;

                        educationElementaryLevelLabel.Width = educationElementaryLevelCountTotalWidth;
                        educationElementaryLevelLabel.Content = educationElementaryLevelCount + " (" + educationElementaryLevelCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'Elementary Graduate'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationElementaryGraduateCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationElementaryGraduateCountTotal = (educationElementaryGraduateCount * 100) / educationCount;
                        educationElementaryGraduateCountTotalWidth = (finalWidth * educationElementaryGraduateCountTotal) / 100;

                        educationElementaryGraduateLabel.Width = educationElementaryGraduateCountTotalWidth;
                        educationElementaryGraduateLabel.Content = educationElementaryGraduateCount + " (" + educationElementaryGraduateCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'High School Level'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationHighSchoolLevelCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationHighSchoolLevelCountTotal = (educationHighSchoolLevelCount * 100) / educationCount;
                        educationHighSchoolLevelCountTotalWidth = (finalWidth * educationHighSchoolLevelCountTotal) / 100;

                        educationHighSchoolLevelLabel.Width = educationHighSchoolLevelCountTotalWidth;
                        educationHighSchoolLevelLabel.Content = educationHighSchoolLevelCount + " (" + educationHighSchoolLevelCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'High School Graduate'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationHighSchoolGraduateCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationHighSchoolGraduateCountTotal = (educationHighSchoolGraduateCount * 100) / educationCount;
                        educationHighSchoolGraduateCountTotalWidth = (finalWidth * educationHighSchoolGraduateCountTotal) / 100;

                        educationHighSchoolGraduateLabel.Width = educationHighSchoolGraduateCountTotalWidth;
                        educationHighSchoolGraduateLabel.Content = educationHighSchoolGraduateCount + " (" + educationHighSchoolGraduateCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'Senior High School Level'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationSeniorHighSchoolLevelCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationSeniorHighSchoolLevelCountTotal = (educationSeniorHighSchoolLevelCount * 100) / educationCount;
                        educationSeniorHighSchoolLevelCountTotalWidth = (finalWidth * educationSeniorHighSchoolLevelCountTotal) / 100;

                        educationSeniorHighSchoolLevelLabel.Width = educationSeniorHighSchoolLevelCountTotalWidth;
                        educationSeniorHighSchoolLevelLabel.Content = educationSeniorHighSchoolLevelCount + " (" + educationSeniorHighSchoolLevelCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'Senior High School Graduate'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationSeniorHighSchoolGraduateCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationSeniorHighSchoolGraduateCountTotal = (educationSeniorHighSchoolGraduateCount * 100) / educationCount;
                        educationSeniorHighSchoolGraduateCountTotalWidth = (finalWidth * educationSeniorHighSchoolGraduateCountTotal) / 100;

                        educationSeniorHighSchoolGraduateLabel.Width = educationSeniorHighSchoolGraduateCountTotalWidth;
                        educationSeniorHighSchoolGraduateLabel.Content = educationSeniorHighSchoolGraduateCount + " (" + educationSeniorHighSchoolGraduateCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'College Level'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationCollegeLevelCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationCollegeLevelCountTotal = (educationCollegeLevelCount * 100) / educationCount;
                        educationCollegeLevelCountTotalWidth = (finalWidth * educationCollegeLevelCountTotal) / 100;

                        educationCollegeLevelLabel.Width = educationCollegeLevelCountTotalWidth;
                        educationCollegeLevelLabel.Content = educationCollegeLevelCount + " (" + educationCollegeLevelCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE education = 'College Graduate'", sqlConnection))
                    {
                        sqlConnection.Open();

                        educationCollegeGraduateCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        educationCollegeGraduateCountTotal = (educationCollegeGraduateCount * 100) / educationCount;
                        educationCollegeGraduateCountTotalWidth = (finalWidth * educationCollegeGraduateCountTotal) / 100;

                        educationCollegeGraduateLabel.Width = educationCollegeGraduateCountTotalWidth;
                        educationCollegeGraduateLabel.Content = educationCollegeGraduateCount + " (" + educationCollegeGraduateCountTotal + "%)";

                        sqlConnection.Close();
                    }
                }
            }

            else if (selected == "Immunization")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Visible;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE immunization != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        immunizationCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        immunizationCountLabel.Content = immunizationCount;
                        immunizationCategoryLabel.Content = "immunization";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE immunization = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        immunizationYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        immunizationYesCountTotal = (immunizationYesCount * 100) / immunizationCount;
                        immunizationYesCountTotalWidth = (finalWidth * immunizationYesCountTotal) / 100;

                        immunizationYesLabel.Width = immunizationYesCountTotalWidth;
                        immunizationYesLabel.Content = immunizationYesCount + " (" + immunizationYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE immunization = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        immunizationNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        immunizationNoCountTotal = (immunizationNoCount * 100) / immunizationCount;
                        immunizationNoCountTotalWidth = (finalWidth * immunizationNoCountTotal) / 100;

                        immunizationNoLabel.Width = immunizationNoCountTotalWidth;
                        immunizationNoLabel.Content = immunizationNoCount + " (" + immunizationNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE immunization = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        immunizationNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        immunizationNACountTotal = (immunizationNACount * 100) / immunizationCount;
                        immunizationNACountTotalWidth = (finalWidth * immunizationNACountTotal) / 100;

                        immunizationNALabel.Width = immunizationNACountTotalWidth;
                        immunizationNALabel.Content = immunizationNACount + " (" + immunizationNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "IP")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Visible;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE ip != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        ipCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        ipCountLabel.Content = ipCount;
                        ipCategoryLabel.Content = "IP";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE ip = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        ipYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        ipYesCountTotal = (ipYesCount * 100) / ipCount;
                        ipYesCountTotalWidth = (finalWidth * ipYesCountTotal) / 100;

                        ipYesLabel.Width = ipYesCountTotalWidth;
                        ipYesLabel.Content = ipYesCount + " (" + ipYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE ip = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        ipNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        ipNoCountTotal = (ipNoCount * 100) / ipCount;
                        ipNoCountTotalWidth = (finalWidth * ipNoCountTotal) / 100;

                        ipNoLabel.Width = ipNoCountTotalWidth;
                        ipNoLabel.Content = ipNoCount + " (" + ipNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE ip = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        ipNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        ipNACountTotal = (ipNACount * 100) / ipCount;
                        ipNACountTotalWidth = (finalWidth * ipNACountTotal) / 100;

                        ipNALabel.Width = ipNACountTotalWidth;
                        ipNALabel.Content = ipNACount + " (" + ipNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "NTP")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Visible;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE ntp != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        ntpCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        ntpCountLabel.Content = ntpCount;
                        ntpCategoryLabel.Content = "NTP";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE ntp = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        ntpYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        ntpYesCountTotal = (ntpYesCount * 100) / ntpCount;
                        ntpYesCountTotalWidth = (finalWidth * ntpYesCountTotal) / 100;

                        ntpYesLabel.Width = ntpYesCountTotalWidth;
                        ntpYesLabel.Content = ntpYesCount + " (" + ntpYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE ntp = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        ntpNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        ntpNoCountTotal = (ntpNoCount * 100) / ntpCount;
                        ntpNoCountTotalWidth = (finalWidth * ntpNoCountTotal) / 100;

                        ntpNoLabel.Width = ntpNoCountTotalWidth;
                        ntpNoLabel.Content = ntpNoCount + " (" + ntpNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE ntp = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        ntpNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        ntpNACountTotal = (ntpNACount * 100) / ntpCount;
                        ntpNACountTotalWidth = (finalWidth * ntpNACountTotal) / 100;

                        ntpNALabel.Width = ntpNACountTotalWidth;
                        ntpNALabel.Content = ntpNACount + " (" + ntpNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Philhealth")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Visible;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE philhealth != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        philhealthCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        philhealthCountLabel.Content = philhealthCount;
                        philhealthCategoryLabel.Content = "Philhealth";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE philhealth = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        philhealthYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        philhealthYesCountTotal = (philhealthYesCount * 100) / philhealthCount;
                        philhealthYesCountTotalWidth = (finalWidth * philhealthYesCountTotal) / 100;

                        philhealthYesLabel.Width = philhealthYesCountTotalWidth;
                        philhealthYesLabel.Content = philhealthYesCount + " (" + philhealthYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE philhealth = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        philhealthNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        philhealthNoCountTotal = (philhealthNoCount * 100) / philhealthCount;
                        philhealthNoCountTotalWidth = (finalWidth * philhealthNoCountTotal) / 100;

                        philhealthNoLabel.Width = philhealthNoCountTotalWidth;
                        philhealthNoLabel.Content = philhealthNoCount + " (" + philhealthNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE philhealth = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        philhealthNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        philhealthNACountTotal = (philhealthNACount * 100) / philhealthCount;
                        philhealthNACountTotalWidth = (finalWidth * philhealthNACountTotal) / 100;

                        philhealthNALabel.Width = philhealthNACountTotalWidth;
                        philhealthNALabel.Content = philhealthNACount + " (" + philhealthNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "PWD")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Visible;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE pwd != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        pwdCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        pwdCountLabel.Content = pwdCount;
                        pwdCategoryLabel.Content = "PWD";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE pwd = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        pwdYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        pwdYesCountTotal = (pwdYesCount * 100) / pwdCount;
                        pwdYesCountTotalWidth = (finalWidth * pwdYesCountTotal) / 100;

                        pwdYesLabel.Width = pwdYesCountTotalWidth;
                        pwdYesLabel.Content = pwdYesCount + " (" + pwdYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE pwd = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        pwdNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        pwdNoCountTotal = (pwdNoCount * 100) / pwdCount;
                        pwdNoCountTotalWidth = (finalWidth * pwdNoCountTotal) / 100;

                        pwdNoLabel.Width = pwdNoCountTotalWidth;
                        pwdNoLabel.Content = pwdNoCount + " (" + pwdNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE pwd = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        pwdNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        pwdNACountTotal = (pwdNACount * 100) / pwdCount;
                        pwdNACountTotalWidth = (finalWidth * pwdNACountTotal) / 100;

                        pwdNALabel.Width = pwdNACountTotalWidth;
                        pwdNALabel.Content = pwdNACount + " (" + pwdNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Sex")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 254;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Visible;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE sex != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        sexCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        sexCountLabel.Content = sexCount;
                        sexCategoryLabel.Content = "Sex";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE sex = 'Male'", sqlConnection))
                    {
                        sqlConnection.Open();

                        sexMaleCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        sexMaleCountTotal = (sexMaleCount * 100) / sexCount;
                        sexMaleCountTotalWidth = (finalWidth * sexMaleCountTotal) / 100;

                        sexMaleLabel.Width = sexMaleCountTotalWidth;
                        sexMaleLabel.Content = sexMaleCount + " (" + sexMaleCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE sex = 'Female'", sqlConnection))
                    {
                        sqlConnection.Open();

                        sexFemaleCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        sexFemaleCountTotal = (sexFemaleCount * 100) / sexCount;
                        sexFemaleCountTotalWidth = (finalWidth * sexFemaleCountTotal) / 100;

                        sexFemaleLabel.Width = sexFemaleCountTotalWidth;
                        sexFemaleLabel.Content = sexFemaleCount + " (" + sexFemaleCountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Smooking")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Visible;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE smooking != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        smookingCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        smookingCountLabel.Content = smookingCount;
                        smookingCategoryLabel.Content = "Smooking";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE smooking = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        smookingYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        smookingYesCountTotal = (smookingYesCount * 100) / smookingCount;
                        smookingYesCountTotalWidth = (finalWidth * smookingYesCountTotal) / 100;

                        smookingYesLabel.Width = smookingYesCountTotalWidth;
                        smookingYesLabel.Content = smookingYesCount + " (" + smookingYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE smooking = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        smookingNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        smookingNoCountTotal = (smookingNoCount * 100) / smookingCount;
                        smookingNoCountTotalWidth = (finalWidth * smookingNoCountTotal) / 100;

                        smookingNoLabel.Width = smookingNoCountTotalWidth;
                        smookingNoLabel.Content = smookingNoCount + " (" + smookingNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE smooking = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        smookingNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        smookingNACountTotal = (smookingNACount * 100) / smookingCount;
                        smookingNACountTotalWidth = (finalWidth * smookingNACountTotal) / 100;

                        smookingNALabel.Width = smookingNACountTotalWidth;
                        smookingNALabel.Content = smookingNACount + " (" + smookingNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "WRA")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Visible;
                suffixGrid.Visibility = Visibility.Hidden;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    //count all not empty 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE wra != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        wraCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        wraCountLabel.Content = wraCount;
                        wraCategoryLabel.Content = "WRA";

                        sqlConnection.Close();
                    }

                    //count all Yes 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE wra = 'Yes'", sqlConnection))
                    {
                        sqlConnection.Open();

                        wraYesCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        wraYesCountTotal = (wraYesCount * 100) / wraCount;
                        wraYesCountTotalWidth = (finalWidth * wraYesCountTotal) / 100;

                        wraYesLabel.Width = wraYesCountTotalWidth;
                        wraYesLabel.Content = wraYesCount + " (" + wraYesCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all No 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE wra = 'No'", sqlConnection))
                    {
                        sqlConnection.Open();

                        wraNoCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        wraNoCountTotal = (wraNoCount * 100) / wraCount;
                        wraNoCountTotalWidth = (finalWidth * wraNoCountTotal) / 100;

                        wraNoLabel.Width = wraNoCountTotalWidth;
                        wraNoLabel.Content = wraNoCount + " (" + wraNoCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    //count all NA 4Ps
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM household WHERE wra = 'N/A'", sqlConnection))
                    {
                        sqlConnection.Open();

                        wraNACount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        wraNACountTotal = (wraNACount * 100) / wraCount;
                        wraNACountTotalWidth = (finalWidth * wraNACountTotal) / 100;

                        wraNALabel.Width = wraNACountTotalWidth;
                        wraNALabel.Content = wraNACount + " (" + wraNACountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }

            else if (selected == "Suffix")
            {
                MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

                defaultWidth = MaxWidth - 228.5;

                fourpsGrid.Visibility = Visibility.Hidden;
                agriculturalFacilityGrid.Visibility = Visibility.Hidden;
                animalGrid.Visibility = Visibility.Hidden;
                backgroundGrid.Visibility = Visibility.Hidden;
                blindDrainageGrid.Visibility = Visibility.Hidden;
                breastFeedingGrid.Visibility = Visibility.Hidden;
                dependencyGrid.Visibility = Visibility.Hidden;
                dwtwbGrid.Visibility = Visibility.Hidden;
                familyPlanningGrid.Visibility = Visibility.Hidden;
                //garbageDisposalGrid.Visibility = Visibility.Hidden;
                educationGrid.Visibility = Visibility.Hidden;
                immunizationGrid.Visibility = Visibility.Hidden;
                ipGrid.Visibility = Visibility.Hidden;
                ntpGrid.Visibility = Visibility.Hidden;
                philhealthGrid.Visibility = Visibility.Hidden;
                pwdGrid.Visibility = Visibility.Hidden;
                sexGrid.Visibility = Visibility.Hidden;
                smookingGrid.Visibility = Visibility.Hidden;
                wraGrid.Visibility = Visibility.Hidden;
                suffixGrid.Visibility = Visibility.Visible;

                finalWidth = defaultWidth;

                using (SqlConnection sqlConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True"))
                {
                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE suffix != ''", sqlConnection))
                    {
                        sqlConnection.Open();

                        suffixCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        suffixCountLabel.Content = suffixCount;
                        suffixCategoryLabel.Content = "Suffix";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE suffix = 'Jr.'", sqlConnection))
                    {
                        sqlConnection.Open();

                        suffixJrCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        suffixJrCountTotal = (suffixJrCount * 100) / suffixCount;
                        suffixJrCountTotalWidth = (finalWidth * suffixJrCountTotal) / 100;

                        suffixJrLabel.Width = suffixJrCountTotalWidth;
                        suffixJrLabel.Content = suffixJrCount + " (" + suffixJrCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE suffix = 'Sr.'", sqlConnection))
                    {
                        sqlConnection.Open();

                        suffixSrCount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        suffixSrCountTotal = (suffixSrCount * 100) / suffixCount;
                        suffixSrCountTotalWidth = (finalWidth * suffixSrCountTotal) / 100;

                        suffixSrLabel.Width = suffixSrCountTotalWidth;
                        suffixSrLabel.Content = suffixSrCount + " (" + suffixSrCountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE suffix = 'I'", sqlConnection))
                    {
                        sqlConnection.Open();

                        suffixICount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        suffixICountTotal = (suffixICount * 100) / suffixCount;
                        suffixICountTotalWidth = (finalWidth * suffixICountTotal) / 100;

                        suffixILabel.Width = suffixICountTotalWidth;
                        suffixILabel.Content = suffixICount + " (" + suffixICountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE suffix = 'II'", sqlConnection))
                    {
                        sqlConnection.Open();

                        suffixIICount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        suffixIICountTotal = (suffixIICount * 100) / suffixCount;
                        suffixIICountTotalWidth = (finalWidth * suffixIICountTotal) / 100;

                        suffixIILabel.Width = suffixIICountTotalWidth;
                        suffixIILabel.Content = suffixIICount + " (" + suffixIICountTotal + "%)";

                        sqlConnection.Close();
                    }

                    using (SqlCommand sqlCommand = new SqlCommand("SELECT COUNT(*) FROM familyMembers WHERE suffix = 'III'", sqlConnection))
                    {
                        sqlConnection.Open();

                        suffixIIICount = Convert.ToInt32(sqlCommand.ExecuteScalar());
                        suffixIIICountTotal = (suffixIIICount * 100) / suffixCount;
                        suffixIIICountTotalWidth = (finalWidth * suffixIIICountTotal) / 100;

                        suffixIIILabel.Width = suffixIIICountTotalWidth;
                        suffixIIILabel.Content = suffixIIICount + " (" + suffixIIICountTotal + "%)";

                        sqlConnection.Close();
                    }

                }
            }


        }
    }
}
