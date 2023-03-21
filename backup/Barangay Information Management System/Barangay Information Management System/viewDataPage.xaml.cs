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
    /// Interaction logic for viewDataPage.xaml
    /// </summary>
    public partial class viewDataPage : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String selectedID, selectedIDhouseID;

        String barangay, purok, firstName, middleName, lastName, suffix, tribe, sex, dependency, birthDate, age, religion, education, occupation, relationship, pwd, ip, philhealth, breastFeeding, ntp, smooking, fourps;

        String firstMemberFirstName, firstMemberMiddleName, firstMemberLastName, firstMemberSuffix, firstMemberDependency, firstMemberTribe, firstMemberSex, firstMemberBirthDate;
        String firstMemberReligion, firstMemberEducation, firstMemberAge, firstMemberOccupation, firstMemberRelationship, firstMemberPWD, firstMemberIP, firstMemberPhilhealth;
        String firstMemberBreastFeeding, firstMemberNTP, firstMemberSmooking, firstMemberFourps;

        String head_or_member;

        String viewMemberFirstName, viewMemberMiddleName, viewMemberLastName, viewMemberSuffix, viewMemberDependency, viewMemberTribe, viewMemberSex, viewMemberBirthDate;
        String viewMemberReligion, viewMemberEducation, viewMemberAge, viewMemberOccupation, viewMemberRelationship, viewMemberPWD, viewMemberIP, viewMemberPhilhealth;
        String viewMemberBreastFeeding, viewMemberNTP, viewMemberSmooking, viewMemberFourps;

        String mother_tongue_container, house_type_container, sanitary_toilet_container, immunization_container, wra_container, garbage_disposal_container, water_source_container;
        String family_planning_container, background_gardening_container, livelihood_status_container, animals_container, blind_drainage_container, communication_container;
        String homelot_status_container, energy_source_container, dwtwb_container, vulnerable_status_container, agricultural_facilities_container, other_source_of_income_container;
        String house_status_container, transportation_container;

        String updateFirstMemberID;
        String SelectedViewMember;

        String SelectedViewProduct;
        String SelectedDeleteProduct;

        String famnumValue;

        String product, productID;

        int famnumValueInteger;

        int viewClick = 0;

        int viewClickProduct = 0;

        int selectedIDInteger, selectedIDhouseIDInteger;

        public viewDataPage()
        {
            InitializeComponent();

            MaxHeight = SystemParameters.MaximizedPrimaryScreenHeight;
            MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

            //getting selectedid of member
            SqlConnection getSelectedMemberIDConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getSelectedMemberIDConnection.Open();
            SqlCommand getSelectedMemberIDCMD = new SqlCommand();
            getSelectedMemberIDCMD.Connection = getSelectedMemberIDConnection;
            getSelectedMemberIDCMD.CommandText = "SELECT * FROM selectedFamilyMember WHERE selectedFamilyMember_id = 1";
            getSelectedMemberIDCMD.ExecuteNonQuery();

            SqlDataReader getSelectedMemberIDDR = getSelectedMemberIDCMD.ExecuteReader();
            while (getSelectedMemberIDDR.Read())
            {
                selectedID = getSelectedMemberIDDR.GetValue(1).ToString();
                selectedIDInteger = Int32.Parse(selectedID);
            }
            getSelectedMemberIDDR.Close();
            getSelectedMemberIDConnection.Close();



            //getting selectedid of householdID
            SqlConnection getSelectedMemberHouseholdIDConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getSelectedMemberHouseholdIDConnection.Open();
            SqlCommand getSelectedMemberHouseholdIDCMD = new SqlCommand();
            getSelectedMemberHouseholdIDCMD.Connection = getSelectedMemberHouseholdIDConnection;
            getSelectedMemberHouseholdIDCMD.CommandText = "SELECT * FROM familyMembers WHERE family_member_id = @memberID";
            getSelectedMemberHouseholdIDCMD.Parameters.AddWithValue("@memberID", selectedID);
            getSelectedMemberHouseholdIDCMD.ExecuteNonQuery();

            SqlDataReader getSelectedMemberHouseholdIDDR = getSelectedMemberHouseholdIDCMD.ExecuteReader();
            while (getSelectedMemberHouseholdIDDR.Read())
            {
                selectedIDhouseID = getSelectedMemberHouseholdIDDR.GetValue(1).ToString();
                selectedIDhouseIDInteger = Int32.Parse(selectedID);
                firstName = getSelectedMemberHouseholdIDDR.GetValue(3).ToString();
                middleName = getSelectedMemberHouseholdIDDR.GetValue(4).ToString();
                lastName = getSelectedMemberHouseholdIDDR.GetValue(5).ToString();
                suffix = getSelectedMemberHouseholdIDDR.GetValue(6).ToString();
                head_or_member = getSelectedMemberHouseholdIDDR.GetValue(7).ToString();
                dependency = getSelectedMemberHouseholdIDDR.GetValue(8).ToString();
                tribe = getSelectedMemberHouseholdIDDR.GetValue(9).ToString();
                sex = getSelectedMemberHouseholdIDDR.GetValue(10).ToString();
                birthDate = getSelectedMemberHouseholdIDDR.GetValue(11).ToString();
                age = getSelectedMemberHouseholdIDDR.GetValue(12).ToString();
                religion = getSelectedMemberHouseholdIDDR.GetValue(13).ToString();
                education = getSelectedMemberHouseholdIDDR.GetValue(14).ToString();
                occupation = getSelectedMemberHouseholdIDDR.GetValue(15).ToString();
                relationship = getSelectedMemberHouseholdIDDR.GetValue(16).ToString();
                pwd = getSelectedMemberHouseholdIDDR.GetValue(17).ToString();
                ip = getSelectedMemberHouseholdIDDR.GetValue(18).ToString();
                philhealth = getSelectedMemberHouseholdIDDR.GetValue(19).ToString();
                breastFeeding = getSelectedMemberHouseholdIDDR.GetValue(20).ToString();
                ntp = getSelectedMemberHouseholdIDDR.GetValue(21).ToString();
                smooking = getSelectedMemberHouseholdIDDR.GetValue(22).ToString();
                fourps = getSelectedMemberHouseholdIDDR.GetValue(23).ToString();
            }
            getSelectedMemberHouseholdIDDR.Close();
            getSelectedMemberHouseholdIDConnection.Close();

            if(head_or_member == "Member")
            {
                editImagePurok.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                edit_data_purok_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                edit_data_purok_btn.IsEnabled = false;
                edit_data_purok_btn.BorderThickness = new Thickness(1);
                edit_data_purok_btn.BorderBrush = Brushes.Black;
                edit_data_purok_btn.Cursor = Cursors.Arrow;
                edit_data_purok_btn.Foreground = Brushes.DarkGray;

                editImageMemberInformation.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                edit_data_member_information_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                edit_data_member_information_btn.IsEnabled = false;
                edit_data_member_information_btn.BorderThickness = new Thickness(1);
                edit_data_member_information_btn.BorderBrush = Brushes.Black;
                edit_data_member_information_btn.Cursor = Cursors.Arrow;
                edit_data_member_information_btn.Foreground = Brushes.DarkGray;
                editMemberInformationTextBlock.SetValue(TextBlock.FontWeightProperty, FontWeights.Normal);

                editImageBackgroundInformation.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                edit_data_background_information_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                edit_data_background_information_btn.IsEnabled = false;
                edit_data_background_information_btn.BorderThickness = new Thickness(1);
                edit_data_background_information_btn.BorderBrush = Brushes.Black;
                edit_data_background_information_btn.Cursor = Cursors.Arrow;
                edit_data_background_information_btn.Foreground = Brushes.DarkGray;

                editImageProduct.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                edit_data_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                edit_data_product_btn.IsEnabled = false;
                edit_data_product_btn.BorderThickness = new Thickness(1);
                edit_data_product_btn.BorderBrush = Brushes.Black;
                edit_data_product_btn.Cursor = Cursors.Arrow;
                edit_data_product_btn.Foreground = Brushes.DarkGray;
                editProductTextBlock.SetValue(TextBlock.FontWeightProperty, FontWeights.Normal);

                purokWarning.Visibility = Visibility.Visible;
                memberWarning.Visibility = Visibility.Visible;
                memberWarning1.Visibility = Visibility.Visible;
                backgroundWarning.Visibility = Visibility.Visible;
                productWarning.Visibility = Visibility.Visible;
                productWarning1.Visibility = Visibility.Visible;

                HeadInformationLabel.Content = "Member Information";

                //displayingfamily members in member_Datagrid
                connection.Open();
                string udpateMemberDataGrid = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND family_member_id != @memberID ORDER BY full_name";
                SqlCommand udpateMemberDataGridCMD = new SqlCommand(udpateMemberDataGrid, connection);
                udpateMemberDataGridCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                udpateMemberDataGridCMD.Parameters.AddWithValue("@memberID", selectedID);
                udpateMemberDataGridCMD.ExecuteNonQuery();
                SqlDataAdapter udpateMemberDataGridDA = new SqlDataAdapter(udpateMemberDataGridCMD);
                DataTable udpateMemberDataGridDT = new DataTable("familyMembers");
                udpateMemberDataGridDA.Fill(udpateMemberDataGridDT);
                member_dataGrid.ItemsSource = udpateMemberDataGridDT.DefaultView;
                udpateMemberDataGridDA.Update(udpateMemberDataGridDT);
                connection.Close();

                connection.Open();
                string getFamilyMembersCount = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND family_member_id != @memberID ORDER BY full_name";
                SqlCommand getFamilyMembersCountCMD = new SqlCommand(getFamilyMembersCount, connection);
                getFamilyMembersCountCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                getFamilyMembersCountCMD.Parameters.AddWithValue("@memberID", selectedID);
                getFamilyMembersCountCMD.ExecuteNonQuery();
                SqlDataAdapter getFamilyMembersCountDA = new SqlDataAdapter(getFamilyMembersCountCMD);
                DataTable getFamilyMembersCountDT = new DataTable("familyMembers");
                getFamilyMembersCountDA.Fill(getFamilyMembersCountDT);
                member_dataGrid.ItemsSource = getFamilyMembersCountDT.DefaultView;
                getFamilyMembersCountDA.Update(getFamilyMembersCountDT);
                connection.Close();

                if (member_dataGrid.Items.Count == 0)
                {
                    empty_member_dataGrid.Visibility = Visibility.Visible;
                    member_dataGrid.Visibility = Visibility.Hidden;
                }

                //getting first family member
                SqlConnection getFirstMemberConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                getFirstMemberConnection.Open();
                SqlCommand getFirstMemberCMD = new SqlCommand();
                getFirstMemberCMD.Connection = getFirstMemberConnection;
                getFirstMemberCMD.CommandText = "SELECT TOP 1 * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND family_member_id != @memberID ORDER BY full_name";
                getFirstMemberCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                getFirstMemberCMD.Parameters.AddWithValue("@memberID", selectedID);
                getFirstMemberCMD.ExecuteNonQuery();

                SqlDataReader getFirstMemberDR = getFirstMemberCMD.ExecuteReader();
                while (getFirstMemberDR.Read())
                {
                    firstMemberFirstName = getFirstMemberDR.GetValue(3).ToString();
                    firstMemberMiddleName = getFirstMemberDR.GetValue(4).ToString();
                    firstMemberLastName = getFirstMemberDR.GetValue(5).ToString();
                    firstMemberSuffix = getFirstMemberDR.GetValue(6).ToString();
                    firstMemberDependency = getFirstMemberDR.GetValue(8).ToString();
                    firstMemberTribe = getFirstMemberDR.GetValue(9).ToString();
                    firstMemberSex = getFirstMemberDR.GetValue(10).ToString();
                    firstMemberBirthDate = getFirstMemberDR.GetValue(11).ToString();
                    firstMemberAge = getFirstMemberDR.GetValue(12).ToString();
                    firstMemberReligion = getFirstMemberDR.GetValue(13).ToString();
                    firstMemberEducation = getFirstMemberDR.GetValue(14).ToString();
                    firstMemberOccupation = getFirstMemberDR.GetValue(15).ToString();
                    firstMemberRelationship = getFirstMemberDR.GetValue(16).ToString();
                    firstMemberPWD = getFirstMemberDR.GetValue(17).ToString();
                    firstMemberIP = getFirstMemberDR.GetValue(18).ToString();
                    firstMemberPhilhealth = getFirstMemberDR.GetValue(19).ToString();
                    firstMemberBreastFeeding = getFirstMemberDR.GetValue(20).ToString();
                    firstMemberNTP = getFirstMemberDR.GetValue(21).ToString();
                    firstMemberSmooking = getFirstMemberDR.GetValue(22).ToString();
                    firstMemberFourps = getFirstMemberDR.GetValue(23).ToString();
                }
                getFirstMemberDR.Close();
                getFirstMemberConnection.Close();
            }

            else
            {
                //displayingfamily members in member_Datagrid
                connection.Open();
                string udpateMemberDataGrid = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                SqlCommand udpateMemberDataGridCMD = new SqlCommand(udpateMemberDataGrid, connection);
                udpateMemberDataGridCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                udpateMemberDataGridCMD.ExecuteNonQuery();
                SqlDataAdapter udpateMemberDataGridDA = new SqlDataAdapter(udpateMemberDataGridCMD);
                DataTable udpateMemberDataGridDT = new DataTable("familyMembers");
                udpateMemberDataGridDA.Fill(udpateMemberDataGridDT);
                member_dataGrid.ItemsSource = udpateMemberDataGridDT.DefaultView;
                udpateMemberDataGridDA.Update(udpateMemberDataGridDT);
                connection.Close();

                connection.Open();
                string getFamilyMembersCount = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                SqlCommand getFamilyMembersCountCMD = new SqlCommand(getFamilyMembersCount, connection);
                getFamilyMembersCountCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                getFamilyMembersCountCMD.ExecuteNonQuery();
                SqlDataAdapter getFamilyMembersCountDA = new SqlDataAdapter(getFamilyMembersCountCMD);
                DataTable getFamilyMembersCountDT = new DataTable("familyMembers");
                getFamilyMembersCountDA.Fill(getFamilyMembersCountDT);
                member_dataGrid.ItemsSource = getFamilyMembersCountDT.DefaultView;
                getFamilyMembersCountDA.Update(getFamilyMembersCountDT);
                connection.Close();

                if (member_dataGrid.Items.Count == 0)
                {
                    empty_member_dataGrid.Visibility = Visibility.Visible;
                    member_dataGrid.Visibility = Visibility.Hidden;
                }

                //getting first family member
                SqlConnection getFirstMemberConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                getFirstMemberConnection.Open();
                SqlCommand getFirstMemberCMD = new SqlCommand();
                getFirstMemberCMD.Connection = getFirstMemberConnection;
                getFirstMemberCMD.CommandText = "SELECT TOP 1 * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                getFirstMemberCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                getFirstMemberCMD.ExecuteNonQuery();

                SqlDataReader getFirstMemberDR = getFirstMemberCMD.ExecuteReader();
                while (getFirstMemberDR.Read())
                {
                    firstMemberFirstName = getFirstMemberDR.GetValue(3).ToString();
                    firstMemberMiddleName = getFirstMemberDR.GetValue(4).ToString();
                    firstMemberLastName = getFirstMemberDR.GetValue(5).ToString();
                    firstMemberSuffix = getFirstMemberDR.GetValue(6).ToString();
                    firstMemberDependency = getFirstMemberDR.GetValue(8).ToString();
                    firstMemberTribe = getFirstMemberDR.GetValue(9).ToString();
                    firstMemberSex = getFirstMemberDR.GetValue(10).ToString();
                    firstMemberBirthDate = getFirstMemberDR.GetValue(11).ToString();
                    firstMemberAge = getFirstMemberDR.GetValue(12).ToString();
                    firstMemberReligion = getFirstMemberDR.GetValue(13).ToString();
                    firstMemberEducation = getFirstMemberDR.GetValue(14).ToString();
                    firstMemberOccupation = getFirstMemberDR.GetValue(15).ToString();
                    firstMemberRelationship = getFirstMemberDR.GetValue(16).ToString();
                    firstMemberPWD = getFirstMemberDR.GetValue(17).ToString();
                    firstMemberIP = getFirstMemberDR.GetValue(18).ToString();
                    firstMemberPhilhealth = getFirstMemberDR.GetValue(19).ToString();
                    firstMemberBreastFeeding = getFirstMemberDR.GetValue(20).ToString();
                    firstMemberNTP = getFirstMemberDR.GetValue(21).ToString();
                    firstMemberSmooking = getFirstMemberDR.GetValue(22).ToString();
                    firstMemberFourps = getFirstMemberDR.GetValue(23).ToString();
                }
                getFirstMemberDR.Close();
                getFirstMemberConnection.Close();
            }

            //getting selectedid of householdID
            SqlConnection getSelectedHouseholdConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getSelectedHouseholdConnection.Open();
            SqlCommand getSelectedHouseholdCMD = new SqlCommand();
            getSelectedHouseholdCMD.Connection = getSelectedHouseholdConnection;
            getSelectedHouseholdCMD.CommandText = "SELECT * FROM household WHERE household_id = @householdID";
            getSelectedHouseholdCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
            getSelectedHouseholdCMD.ExecuteNonQuery();

            SqlDataReader getSelectedHouseholdDR = getSelectedHouseholdCMD.ExecuteReader();
            while (getSelectedHouseholdDR.Read())
            {
                barangay = getSelectedHouseholdDR.GetValue(1).ToString();
                purok = getSelectedHouseholdDR.GetValue(2).ToString();
            }
            getSelectedHouseholdDR.Close();
            getSelectedHouseholdConnection.Close();

            if (barangay == "Santa Cruz")
            {
                purokTextbox.Items.Add("Bagong Silang");
                purokTextbox.Items.Add("Bayanihan");
                purokTextbox.Items.Add("Yellow Bell");
            }     

            barangayTextbox.Text = barangay;
            purokTextbox.Text = purok;

            head_first_name_Textbox.Text = firstName;
            head_middle_name_Textbox.Text = middleName;
            head_last_name_Textbox.Text = lastName;
            head_suffix_Textbox.Text = suffix;
            head_dependency_Textbox.Text = dependency;
            head_tribe_Textbox.Text = tribe;
            head_sex_Textbox.Text = sex;
            head_bdate_Textbox.Text = birthDate;
            head_age_Textbox.Text = age;
            head_religion_Textbox.Text = religion;
            head_education_Textbox.Text = education;
            head_occupation_Textbox.Text = occupation;
            head_relation_Textbox.Text = relationship;
            head_pwd_Textbox.Text = pwd;
            head_ip_Textbox.Text = ip;
            head_philhealth_Textbox.Text = ip;
            head_breast_feeding_Textbox.Text = breastFeeding;
            head_ntp_Textbox.Text = ntp;
            head_smooking_Textbox.Text = smooking;
            head_fourps_Textbox.Text = fourps;

            member_first_name_textbox.Text = firstMemberFirstName;
            member_middle_name_textbox.Text = firstMemberMiddleName;
            member_last_name_textbox.Text = firstMemberLastName;
            member_suffix_textbox.Text = firstMemberSuffix;
            member_dependency_textbox.Text = firstMemberDependency;
            member_tribe_textbox.Text = firstMemberTribe;
            member_sex_textbox.Text = firstMemberSex;
            member_bdate_textbox.Text = firstMemberBirthDate;
            member_religion_textbox.Text = firstMemberReligion;
            member_education_textbox.Text = firstMemberEducation;
            member_age_textbox.Text = firstMemberAge;
            member_occupation_textbox.Text = firstMemberOccupation;
            member_relationship_textbox.Text = firstMemberRelationship;
            member_pwd_textbox.Text = firstMemberPWD;
            member_ip_textbox.Text = firstMemberIP;
            member_philhealth_textbox.Text = firstMemberPhilhealth;
            member_breast_feeding_textbox.Text = firstMemberBreastFeeding;
            member_ntp_textbox.Text = firstMemberNTP;
            member_smooking_textbox.Text = firstMemberSmooking;
            member_fourps_textbox.Text = firstMemberFourps;


            //getting household background info
            SqlConnection getBackgroundInformationConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getBackgroundInformationConnection.Open();
            SqlCommand getBackgroundInformationCMD = new SqlCommand();
            getBackgroundInformationCMD.Connection = getBackgroundInformationConnection;
            getBackgroundInformationCMD.CommandText = "SELECT * FROM household WHERE household_id = @householdID";
            getBackgroundInformationCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
            getBackgroundInformationCMD.ExecuteNonQuery();

            SqlDataReader getBackgroundInformationDR = getBackgroundInformationCMD.ExecuteReader();
            while (getBackgroundInformationDR.Read())
            {
                mother_tongue_container = getBackgroundInformationDR.GetValue(4).ToString();
                house_type_container = getBackgroundInformationDR.GetValue(5).ToString();
                sanitary_toilet_container = getBackgroundInformationDR.GetValue(6).ToString();
                immunization_container = getBackgroundInformationDR.GetValue(7).ToString();
                wra_container = getBackgroundInformationDR.GetValue(8).ToString();
                garbage_disposal_container = getBackgroundInformationDR.GetValue(9).ToString();
                water_source_container = getBackgroundInformationDR.GetValue(10).ToString();
                family_planning_container = getBackgroundInformationDR.GetValue(11).ToString();
                background_gardening_container = getBackgroundInformationDR.GetValue(12).ToString();
                livelihood_status_container = getBackgroundInformationDR.GetValue(13).ToString();
                animals_container = getBackgroundInformationDR.GetValue(14).ToString();
                blind_drainage_container = getBackgroundInformationDR.GetValue(15).ToString();
                communication_container = getBackgroundInformationDR.GetValue(16).ToString();
                homelot_status_container = getBackgroundInformationDR.GetValue(17).ToString();
                energy_source_container = getBackgroundInformationDR.GetValue(18).ToString();
                dwtwb_container = getBackgroundInformationDR.GetValue(19).ToString();
                vulnerable_status_container = getBackgroundInformationDR.GetValue(20).ToString();
                agricultural_facilities_container = getBackgroundInformationDR.GetValue(21).ToString();
                house_status_container = getBackgroundInformationDR.GetValue(22).ToString();
                other_source_of_income_container = getBackgroundInformationDR.GetValue(23).ToString();
                transportation_container = getBackgroundInformationDR.GetValue(24).ToString();
            }
            getBackgroundInformationDR.Close();
            getBackgroundInformationConnection.Close();

            household_mother_tongue_textbox.Text = mother_tongue_container;
            household_house_type_textbox.Text = house_type_container;
            household_sanitary_toilet_textbox.Text = sanitary_toilet_container;
            household_immunization_textbox.Text = immunization_container;
            household_wra_textbox.Text = wra_container;
            household_garbage_disposal_textbox.Text = garbage_disposal_container;
            household_water_source_textbox.Text = water_source_container;
            household_family_planning_textbox.Text = family_planning_container;
            household_background_gardening_textbox.Text = background_gardening_container;
            household_livelihood_status_textbox.Text = livelihood_status_container;
            household_animals_textbox.Text = animals_container;
            household_blind_drainage_textbox.Text = blind_drainage_container;
            household_communication_textbox.Text = communication_container;
            household_homelot_status_textbox.Text = homelot_status_container;
            household_energy_source_textbox.Text = energy_source_container;
            household_dwtwb_textbox.Text = dwtwb_container;
            household_vulnerable_status_textbox.Text = vulnerable_status_container;
            household_agricultural_facility_textbox.Text = agricultural_facilities_container;
            household_other_source_of_income_textbox.Text = house_status_container;
            household_house_status_textbox.Text = other_source_of_income_container;
            household_transportation_textbox.Text = transportation_container;

            //getting first product
            SqlConnection getFirstProductConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getFirstProductConnection.Open();
            SqlCommand getFirstProductCMD = new SqlCommand();
            getFirstProductCMD.Connection = getFirstProductConnection;
            getFirstProductCMD.CommandText = "SELECT TOP 1 * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
            getFirstProductCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
            getFirstProductCMD.ExecuteNonQuery();

            SqlDataReader getFirstProductDR = getFirstProductCMD.ExecuteReader();
            while (getFirstProductDR.Read())
            {
                product = getFirstProductDR.GetValue(2).ToString();
            }
            getFirstProductDR.Close();
            getFirstProductConnection.Close();

            product_name_textbox.Text = product;

            connection.Open();
            string getFarmingProductsCount = "SELECT * FROM farmingProducts WHERE product_household_id = @householdID";
            SqlCommand getFarmingProductsCountCMD = new SqlCommand(getFarmingProductsCount, connection);
            getFarmingProductsCountCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
            getFarmingProductsCountCMD.ExecuteNonQuery();
            SqlDataAdapter getFarmingProductsCountDA = new SqlDataAdapter(getFarmingProductsCountCMD);
            DataTable getFarmingProductsCountDT = new DataTable("farmingProducts");
            getFarmingProductsCountDA.Fill(getFarmingProductsCountDT);
            product_dataGrid.ItemsSource = getFarmingProductsCountDT.DefaultView;
            getFarmingProductsCountDA.Update(getFarmingProductsCountDT);
            connection.Close();

            if (product_dataGrid.Items.Count == 0)
            {
                empty_product_dataGrid.Visibility = Visibility.Visible;
                product_dataGrid.Visibility = Visibility.Hidden;
            }

            //displaying farming products in product_datagrid
            connection.Open();
            string udpateProductDataGrid = "SELECT * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
            SqlCommand udpateProductDataGridCMD = new SqlCommand(udpateProductDataGrid, connection);
            udpateProductDataGridCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
            udpateProductDataGridCMD.ExecuteNonQuery();
            SqlDataAdapter udpateProductDataGridDA = new SqlDataAdapter(udpateProductDataGridCMD);
            DataTable udpateProductDataGridDT = new DataTable("farmingProducts");
            udpateProductDataGridDA.Fill(udpateProductDataGridDT);
            product_dataGrid.ItemsSource = udpateProductDataGridDT.DefaultView;
            udpateProductDataGridDA.Update(udpateProductDataGridDT);
            connection.Close();

        }

        private void head_age(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9]+");
            e.Handled = regex.IsMatch(e.Text);
        }


        private void Edit_data_btn_Click(object sender, RoutedEventArgs e)
        {
            edit_data_purok_btn.Visibility = Visibility.Hidden;
            update_data_purok_btn.Visibility = Visibility.Visible;
            cancel_purok_btn.Visibility = Visibility.Visible;

            purok_border.Visibility = Visibility.Visible;
            purok_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            purok_border.BorderThickness = new Thickness(2);
            purokTextbox.IsEnabled = true;
            purokRequired.Visibility = Visibility.Visible;
        }

        private void cancel_btn_Click(object sender, RoutedEventArgs e)
        {
            purokTextbox.Text = purok;
            edit_data_purok_btn.Visibility = Visibility.Visible;
            update_data_purok_btn.Visibility = Visibility.Hidden;
            cancel_purok_btn.Visibility = Visibility.Hidden;

            purok_border.Visibility = Visibility.Visible;
            purok_border.BorderBrush = Brushes.DarkGray;
            purok_border.BorderThickness = new Thickness(1);
            purokTextbox.IsEnabled = false;
            purokRequired.Visibility = Visibility.Hidden;
        }

        private void update_data_purok_btn_Click(object sender, RoutedEventArgs e)
        {
            if (String.IsNullOrEmpty(purokTextbox.Text))
            {
                MessageBox.Show(this, "Purok field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                purok_border.BorderBrush = Brushes.Red;
                purok_border.BorderThickness = new Thickness(2);

                purokTextbox.Focus();

            }

            else
            {
                MessageBoxResult updatePurokResult = MessageBox.Show("Do you want to update the purok?", "Confirmation", MessageBoxButton.OKCancel);

                switch (updatePurokResult)
                {
                    case MessageBoxResult.OK:
                        //Updating Purok
                        connection.Open();
                        SqlCommand updatePurokCMD = new SqlCommand();
                        updatePurokCMD.Connection = connection;
                        updatePurokCMD.CommandText = "UPDATE household SET purok=@purokValue WHERE household_id = @updatePurokHouseholdID";
                        updatePurokCMD.Parameters.AddWithValue("@updatePurokHouseholdID", selectedIDhouseID);
                        updatePurokCMD.Parameters.AddWithValue("@purokValue", purokTextbox.Text);
                        SqlDataAdapter updatePurokDA = new SqlDataAdapter(updatePurokCMD);
                        DataTable updatePurokDT = new DataTable();
                        updatePurokDA.Fill(updatePurokDT);
                        connection.Close();

                        MessageBox.Show("Purok had been updated Successfully");

                        edit_data_purok_btn.Visibility = Visibility.Visible;
                        update_data_purok_btn.Visibility = Visibility.Hidden;
                        cancel_purok_btn.Visibility = Visibility.Hidden;

                        purok_border.Visibility = Visibility.Visible;
                        purok_border.BorderBrush = Brushes.DarkGray;
                        purok_border.BorderThickness = new Thickness(1);
                        purokTextbox.IsEnabled = false;
                        purokRequired.Visibility = Visibility.Hidden;

                        purokTextbox.Focus();
                        break;

                    case MessageBoxResult.Cancel:
                        break;
                }
            }

        }

        private void Edit_data_head_information_btn_Click(object sender, RoutedEventArgs e)
        {
            edit_data_head_information_btn.Visibility = Visibility.Hidden;
            update_data_head_information_btn.Visibility = Visibility.Visible;
            cancel_head_information_btn.Visibility = Visibility.Visible;
            headFirstNameRequired.Visibility = Visibility.Visible;
            headMiddleNameRequired.Visibility = Visibility.Visible;
            headLastNameRequired.Visibility = Visibility.Visible;

            head_first_name_Textbox.Visibility = Visibility.Visible;
            head_first_name_Textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            headFirstNameRequired.Visibility = Visibility.Visible;
            head_first_name_Textbox.BorderThickness = new Thickness(2);
            head_first_name_Textbox.IsReadOnly = false;

            head_middle_name_Textbox.Visibility = Visibility.Visible;
            head_middle_name_Textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            headMiddleNameRequired.Visibility = Visibility.Visible;
            head_middle_name_Textbox.BorderThickness = new Thickness(2);
            head_middle_name_Textbox.IsReadOnly = false;

            head_last_name_Textbox.Visibility = Visibility.Visible;
            head_last_name_Textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            headLastNameRequired.Visibility = Visibility.Visible;
            head_last_name_Textbox.BorderThickness = new Thickness(2);
            head_last_name_Textbox.IsReadOnly = false;

            head_suffix_border.Visibility = Visibility.Visible;
            head_suffix_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_suffix_border.BorderThickness = new Thickness(2);
            head_suffix_Textbox.IsEnabled = true;

            head_dependency_border.Visibility = Visibility.Visible;
            head_dependency_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_dependency_border.BorderThickness = new Thickness(2);
            head_dependency_Textbox.IsEnabled = true;

            head_tribe_border.Visibility = Visibility.Visible;
            head_tribe_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_tribe_border.BorderThickness = new Thickness(2);
            head_tribe_Textbox.IsEnabled = true;

            head_sex_border.Visibility = Visibility.Visible;
            head_sex_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_sex_border.BorderThickness = new Thickness(2);
            head_sex_Textbox.IsEnabled = true;

            head_bdate_Textbox.Visibility = Visibility.Visible;
            head_bdate_Textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_bdate_Textbox.BorderThickness = new Thickness(2);
            head_bdate_Textbox.IsEnabled = true;

            head_age_Textbox.Visibility = Visibility.Visible;
            head_age_Textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_age_Textbox.BorderThickness = new Thickness(2);
            head_age_Textbox.IsReadOnly = false;

            head_religion_border.Visibility = Visibility.Visible;
            head_religion_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_religion_border.BorderThickness = new Thickness(2);
            head_religion_Textbox.IsEnabled = true;

            head_education_border.Visibility = Visibility.Visible;
            head_education_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_education_border.BorderThickness = new Thickness(2);
            head_education_Textbox.IsEnabled = true;

            head_occupation_Textbox.Visibility = Visibility.Visible;
            head_occupation_Textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_occupation_Textbox.BorderThickness = new Thickness(2);
            head_occupation_Textbox.IsReadOnly = false;

            head_relation_border.Visibility = Visibility.Visible;
            head_relation_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_relation_border.BorderThickness = new Thickness(2);
            head_relation_Textbox.IsEnabled = true;

            head_pwd_border.Visibility = Visibility.Visible;
            head_pwd_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_pwd_border.BorderThickness = new Thickness(2);
            head_pwd_Textbox.IsEnabled = true;

            head_ip_border.Visibility = Visibility.Visible;
            head_ip_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_ip_border.BorderThickness = new Thickness(2);
            head_ip_Textbox.IsEnabled = true;

            head_philhealth_border.Visibility = Visibility.Visible;
            head_philhealth_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_philhealth_border.BorderThickness = new Thickness(2);
            head_philhealth_Textbox.IsEnabled = true;

            head_breast_feeding_border.Visibility = Visibility.Visible;
            head_breast_feeding_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_breast_feeding_border.BorderThickness = new Thickness(2);
            head_breast_feeding_Textbox.IsEnabled = true;

            head_ntp_border.Visibility = Visibility.Visible;
            head_ntp_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_ntp_border.BorderThickness = new Thickness(2);
            head_ntp_Textbox.IsEnabled = true;

            head_smooking_border.Visibility = Visibility.Visible;
            head_smooking_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_smooking_border.BorderThickness = new Thickness(2);
            head_smooking_Textbox.IsEnabled = true;

            head_fourps_border.Visibility = Visibility.Visible;
            head_fourps_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_fourps_border.BorderThickness = new Thickness(2);
            head_fourps_Textbox.IsEnabled = true;

        }


        private void Cancel_head_information_btn_Click(object sender, RoutedEventArgs e)
        {
            headFirstNameRequired.Visibility = Visibility.Hidden;
            headMiddleNameRequired.Visibility = Visibility.Hidden;
            headLastNameRequired.Visibility = Visibility.Hidden;

            head_first_name_Textbox.Text = firstName;
            head_middle_name_Textbox.Text = middleName;
            head_last_name_Textbox.Text = lastName;
            head_suffix_Textbox.Text = suffix;
            head_tribe_Textbox.Text = tribe;
            head_sex_Textbox.Text = sex;
            head_bdate_Textbox.Text = birthDate;
            head_age_Textbox.Text = age;
            head_religion_Textbox.Text = religion;
            head_education_Textbox.Text = education;
            head_occupation_Textbox.Text = occupation;
            head_relation_Textbox.Text = relationship;
            head_pwd_Textbox.Text = pwd;
            head_ip_Textbox.Text = ip;
            head_philhealth_Textbox.Text = ip;
            head_breast_feeding_Textbox.Text = breastFeeding;
            head_ntp_Textbox.Text = ntp;
            head_smooking_Textbox.Text = smooking;
            head_fourps_Textbox.Text = fourps;

            edit_data_head_information_btn.Visibility = Visibility.Visible;
            update_data_head_information_btn.Visibility = Visibility.Hidden;
            cancel_head_information_btn.Visibility = Visibility.Hidden;

            head_first_name_Textbox.Visibility = Visibility.Visible;
            head_first_name_Textbox.BorderBrush = Brushes.DarkGray;
            headFirstNameRequired.Visibility = Visibility.Visible;
            head_first_name_Textbox.BorderThickness = new Thickness(1);
            head_first_name_Textbox.IsReadOnly = true;

            head_middle_name_Textbox.Visibility = Visibility.Visible;
            head_middle_name_Textbox.BorderBrush = Brushes.DarkGray;
            headMiddleNameRequired.Visibility = Visibility.Visible;
            head_middle_name_Textbox.BorderThickness = new Thickness(1);
            head_middle_name_Textbox.IsReadOnly = true;

            head_last_name_Textbox.Visibility = Visibility.Visible;
            head_last_name_Textbox.BorderBrush = Brushes.DarkGray;
            headLastNameRequired.Visibility = Visibility.Visible;
            head_last_name_Textbox.BorderThickness = new Thickness(1);
            head_last_name_Textbox.IsReadOnly = true;

            head_suffix_border.Visibility = Visibility.Visible;
            head_suffix_border.BorderBrush = Brushes.DarkGray;
            head_suffix_border.BorderThickness = new Thickness(1);
            head_suffix_Textbox.IsEnabled = false;

            head_dependency_border.Visibility = Visibility.Visible;
            head_dependency_border.BorderBrush = Brushes.DarkGray;
            head_dependency_border.BorderThickness = new Thickness(1);
            head_dependency_Textbox.IsEnabled = false;

            head_tribe_border.Visibility = Visibility.Visible;
            head_tribe_border.BorderBrush = Brushes.DarkGray;
            head_tribe_border.BorderThickness = new Thickness(1);
            head_tribe_Textbox.IsEnabled = false;

            head_sex_border.Visibility = Visibility.Visible;
            head_sex_border.BorderBrush = Brushes.DarkGray;
            head_sex_border.BorderThickness = new Thickness(1);
            head_sex_Textbox.IsEnabled = false;

            head_bdate_Textbox.Visibility = Visibility.Visible;
            head_bdate_Textbox.BorderBrush = Brushes.DarkGray;
            head_bdate_Textbox.BorderThickness = new Thickness(1);
            head_bdate_Textbox.IsEnabled = false;

            head_age_Textbox.Visibility = Visibility.Visible;
            head_age_Textbox.BorderBrush = Brushes.DarkGray;
            head_age_Textbox.BorderThickness = new Thickness(1);
            head_age_Textbox.IsReadOnly = true;

            head_religion_border.Visibility = Visibility.Visible;
            head_religion_border.BorderBrush = Brushes.DarkGray;
            head_religion_border.BorderThickness = new Thickness(1);
            head_religion_Textbox.IsEnabled = false;

            head_education_border.Visibility = Visibility.Visible;
            head_education_border.BorderBrush = Brushes.DarkGray;
            head_education_border.BorderThickness = new Thickness(1);
            head_education_Textbox.IsEnabled = false;

            head_occupation_Textbox.Visibility = Visibility.Visible;
            head_occupation_Textbox.BorderBrush = Brushes.DarkGray;
            head_occupation_Textbox.BorderThickness = new Thickness(1);
            head_occupation_Textbox.IsReadOnly = true;

            head_relation_border.Visibility = Visibility.Visible;
            head_relation_border.BorderBrush = Brushes.DarkGray;
            head_relation_border.BorderThickness = new Thickness(1);
            head_relation_Textbox.IsEnabled = false;

            head_pwd_border.Visibility = Visibility.Visible;
            head_pwd_border.BorderBrush = Brushes.DarkGray;
            head_pwd_border.BorderThickness = new Thickness(1);
            head_pwd_Textbox.IsEnabled = false;

            head_ip_border.Visibility = Visibility.Visible;
            head_ip_border.BorderBrush = Brushes.DarkGray;
            head_ip_border.BorderThickness = new Thickness(1);
            head_ip_Textbox.IsEnabled = false;

            head_philhealth_border.Visibility = Visibility.Visible;
            head_philhealth_border.BorderBrush = Brushes.DarkGray;
            head_philhealth_border.BorderThickness = new Thickness(1);
            head_philhealth_Textbox.IsEnabled = false;

            head_breast_feeding_border.Visibility = Visibility.Visible;
            head_breast_feeding_border.BorderBrush = Brushes.DarkGray;
            head_breast_feeding_border.BorderThickness = new Thickness(1);
            head_breast_feeding_Textbox.IsEnabled = false;

            head_ntp_border.Visibility = Visibility.Visible;
            head_ntp_border.BorderBrush = Brushes.DarkGray;
            head_ntp_border.BorderThickness = new Thickness(1);
            head_ntp_Textbox.IsEnabled = false;

            head_smooking_border.Visibility = Visibility.Visible;
            head_smooking_border.BorderBrush = Brushes.DarkGray;
            head_smooking_border.BorderThickness = new Thickness(1);
            head_smooking_Textbox.IsEnabled = false;

            head_fourps_border.Visibility = Visibility.Visible;
            head_fourps_border.BorderBrush = Brushes.DarkGray;
            head_fourps_border.BorderThickness = new Thickness(1);
            head_fourps_Textbox.IsEnabled = false;
        }

        private void Update_data_head_information_btn_Click(object sender, RoutedEventArgs e)
        {
            //checking empty fields
            if (String.IsNullOrEmpty(head_first_name_Textbox.Text) || String.IsNullOrEmpty(head_middle_name_Textbox.Text) || String.IsNullOrEmpty(head_last_name_Textbox.Text))
            {
                if (head_first_name_Textbox.Text == "")
                {
                    MessageBox.Show(this, "Name field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                    head_first_name_Textbox.BorderBrush = Brushes.Red;
                    head_first_name_Textbox.BorderThickness = new Thickness(2);

                    head_first_name_Textbox.Focus();

                    if (head_middle_name_Textbox.Text == "")
                    {
                        head_middle_name_Textbox.BorderBrush = Brushes.Red;
                        head_middle_name_Textbox.BorderThickness = new Thickness(2);
                    }

                    if (head_last_name_Textbox.Text == "")
                    {
                        head_last_name_Textbox.BorderBrush = Brushes.Red;
                        head_last_name_Textbox.BorderThickness = new Thickness(2);
                    }


                    if (head_middle_name_Textbox.Text != "")
                    {
                        head_middle_name_Textbox.BorderBrush = Brushes.DarkGray;
                        head_middle_name_Textbox.BorderThickness = new Thickness(1);
                    }

                    if (head_last_name_Textbox.Text != "")
                    {
                        head_last_name_Textbox.BorderBrush = Brushes.DarkGray;
                        head_first_name_Textbox.BorderThickness = new Thickness(1);
                    }
                }
                //

                //head middle name
                else if (head_middle_name_Textbox.Text == "")
                {
                    MessageBox.Show(this, "Name field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                    head_first_name_Textbox.BorderBrush = Brushes.DarkGray;
                    head_first_name_Textbox.BorderThickness = new Thickness(1);
                    head_middle_name_Textbox.BorderBrush = Brushes.Red;
                    head_middle_name_Textbox.BorderThickness = new Thickness(2);

                    head_middle_name_Textbox.Focus();

                    if (head_last_name_Textbox.Text == "")
                    {
                        head_last_name_Textbox.BorderBrush = Brushes.Red;
                        head_last_name_Textbox.BorderThickness = new Thickness(2);
                    }

                    else
                    {
                        head_last_name_Textbox.BorderBrush = Brushes.DarkGray;
                        head_last_name_Textbox.BorderThickness = new Thickness(1);
                    }
                }
                //

                //head last name
                else if (head_last_name_Textbox.Text == "")
                {
                    MessageBox.Show(this, "Name field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                    head_first_name_Textbox.BorderBrush = Brushes.DarkGray;
                    head_first_name_Textbox.BorderThickness = new Thickness(1);
                    head_middle_name_Textbox.BorderBrush = Brushes.DarkGray;
                    head_middle_name_Textbox.BorderThickness = new Thickness(1);
                    head_last_name_Textbox.BorderBrush = Brushes.Red;
                    head_last_name_Textbox.BorderThickness = new Thickness(2);

                    head_last_name_Textbox.Focus();
                }
                //
            }
            //

            else
            {
                MessageBoxResult updateHeadInformationResult = MessageBox.Show("Do you want to update the this Information?", "Confirmation", MessageBoxButton.OKCancel);

                switch (updateHeadInformationResult)
                {
                    case MessageBoxResult.OK:
                        //Updating Head Information

                        if(head_or_member == "Member")
                        {
                            connection.Open();
                            SqlCommand updateHeadInformationCMD = new SqlCommand();
                            updateHeadInformationCMD.Connection = connection;
                            updateHeadInformationCMD.CommandText = "UPDATE familyMembers SET full_name = @head_first_name + ' ' + @head_middle_name + ' ' + @head_last_name + ' ' + @head_suffix, first_name=@head_first_name, middle_name=@head_middle_name, " +
                                "last_name = @head_last_name, suffix = @head_suffix, head_or_member = 'Member', dependency = @head_dependency, tribe = @head_tribe, sex = @head_sex, bdate = @head_bdate, age = @head_age, religion = @head_religion, education = @head_education, occupation = @head_occupation, relationship = @head_relationship, " +
                                "pwd = @head_pwd, ip = @head_ip, philhealth = @head_philhealth, breast_feeding = @head_breast_feeding, ntp = @head_ntp, smooking = @head_smooking, fourps = @head_fourps WHERE family_member_id = @head_id";
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_id", selectedID);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_first_name", head_first_name_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_middle_name", head_middle_name_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_last_name", head_last_name_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_suffix", head_suffix_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_dependency", head_dependency_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_tribe", head_tribe_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_sex", head_sex_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_bdate", head_bdate_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_age", head_age_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_religion", head_religion_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_education", head_education_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_occupation", head_occupation_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_relationship", head_relation_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_pwd", head_pwd_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_ip", head_ip_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_philhealth", head_philhealth_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_breast_feeding", head_breast_feeding_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_ntp", head_ntp_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_smooking", head_smooking_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_fourps", head_fourps_Textbox.Text);
                            SqlDataAdapter updateHeadInformationDA = new SqlDataAdapter(updateHeadInformationCMD);
                            DataTable updateHeadInformationDT = new DataTable();
                            updateHeadInformationDA.Fill(updateHeadInformationDT);
                            connection.Close();
                        }

                        else
                        {
                            connection.Open();
                            SqlCommand updateHeadInformationCMD = new SqlCommand();
                            updateHeadInformationCMD.Connection = connection;
                            updateHeadInformationCMD.CommandText = "UPDATE familyMembers SET full_name = @head_first_name + ' ' + @head_middle_name + ' ' + @head_last_name + ' ' + @head_suffix, first_name=@head_first_name, middle_name=@head_middle_name, " +
                                "last_name = @head_last_name, suffix = @head_suffix, head_or_member = 'Head', dependency = @head_dependency, tribe = @head_tribe, sex = @head_sex, bdate = @head_bdate, age = @head_age, religion = @head_religion, education = @head_education, occupation = @head_occupation, relationship = @head_relationship, " +
                                "pwd = @head_pwd, ip = @head_ip, philhealth = @head_philhealth, breast_feeding = @head_breast_feeding, ntp = @head_ntp, smooking = @head_smooking, fourps = @head_fourps WHERE family_member_id = @head_id";
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_id", selectedID);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_first_name", head_first_name_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_middle_name", head_middle_name_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_last_name", head_last_name_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_suffix", head_suffix_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_dependency", head_dependency_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_tribe", head_tribe_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_sex", head_sex_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_bdate", head_bdate_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_age", head_age_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_religion", head_religion_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_education", head_education_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_occupation", head_occupation_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_relationship", head_relation_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_pwd", head_pwd_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_ip", head_ip_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_philhealth", head_philhealth_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_breast_feeding", head_breast_feeding_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_ntp", head_ntp_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_smooking", head_smooking_Textbox.Text);
                            updateHeadInformationCMD.Parameters.AddWithValue("@head_fourps", head_fourps_Textbox.Text);
                            SqlDataAdapter updateHeadInformationDA = new SqlDataAdapter(updateHeadInformationCMD);
                            DataTable updateHeadInformationDT = new DataTable();
                            updateHeadInformationDA.Fill(updateHeadInformationDT);
                            connection.Close();
                        }
                        
                        MessageBox.Show("Information had been updated Successfully");

                        headFirstNameRequired.Visibility = Visibility.Hidden;
                        headMiddleNameRequired.Visibility = Visibility.Hidden;
                        headLastNameRequired.Visibility = Visibility.Hidden;

                        edit_data_head_information_btn.Visibility = Visibility.Visible;
                        update_data_head_information_btn.Visibility = Visibility.Hidden;
                        cancel_head_information_btn.Visibility = Visibility.Hidden;

                        edit_data_head_information_btn.Visibility = Visibility.Visible;
                        update_data_head_information_btn.Visibility = Visibility.Hidden;
                        cancel_head_information_btn.Visibility = Visibility.Hidden;

                        head_first_name_Textbox.Visibility = Visibility.Visible;
                        head_first_name_Textbox.BorderBrush = Brushes.DarkGray;
                        headFirstNameRequired.Visibility = Visibility.Visible;
                        head_first_name_Textbox.BorderThickness = new Thickness(1);
                        head_first_name_Textbox.IsReadOnly = true;

                        head_middle_name_Textbox.Visibility = Visibility.Visible;
                        head_middle_name_Textbox.BorderBrush = Brushes.DarkGray;
                        headMiddleNameRequired.Visibility = Visibility.Visible;
                        head_middle_name_Textbox.BorderThickness = new Thickness(1);
                        head_middle_name_Textbox.IsReadOnly = true;

                        head_last_name_Textbox.Visibility = Visibility.Visible;
                        head_last_name_Textbox.BorderBrush = Brushes.DarkGray;
                        headLastNameRequired.Visibility = Visibility.Visible;
                        head_last_name_Textbox.BorderThickness = new Thickness(1);
                        head_last_name_Textbox.IsReadOnly = true;

                        head_suffix_border.Visibility = Visibility.Visible;
                        head_suffix_border.BorderBrush = Brushes.DarkGray;
                        head_suffix_border.BorderThickness = new Thickness(1);
                        head_suffix_Textbox.IsEnabled = false;

                        head_dependency_border.Visibility = Visibility.Visible;
                        head_dependency_border.BorderBrush = Brushes.DarkGray;
                        head_dependency_border.BorderThickness = new Thickness(1);
                        head_dependency_Textbox.IsEnabled = false;

                        head_tribe_border.Visibility = Visibility.Visible;
                        head_tribe_border.BorderBrush = Brushes.DarkGray;
                        head_tribe_border.BorderThickness = new Thickness(1);
                        head_tribe_Textbox.IsEnabled = false;

                        head_sex_border.Visibility = Visibility.Visible;
                        head_sex_border.BorderBrush = Brushes.DarkGray;
                        head_sex_border.BorderThickness = new Thickness(1);
                        head_sex_Textbox.IsEnabled = false;

                        head_bdate_Textbox.Visibility = Visibility.Visible;
                        head_bdate_Textbox.BorderBrush = Brushes.DarkGray;
                        head_bdate_Textbox.BorderThickness = new Thickness(1);
                        head_bdate_Textbox.IsEnabled = false;

                        head_age_Textbox.Visibility = Visibility.Visible;
                        head_age_Textbox.BorderBrush = Brushes.DarkGray;
                        head_age_Textbox.BorderThickness = new Thickness(1);
                        head_age_Textbox.IsReadOnly = true;

                        head_religion_border.Visibility = Visibility.Visible;
                        head_religion_border.BorderBrush = Brushes.DarkGray;
                        head_religion_border.BorderThickness = new Thickness(1);
                        head_religion_Textbox.IsEnabled = false;

                        head_education_border.Visibility = Visibility.Visible;
                        head_education_border.BorderBrush = Brushes.DarkGray;
                        head_education_border.BorderThickness = new Thickness(1);
                        head_education_Textbox.IsEnabled = false;

                        head_occupation_Textbox.Visibility = Visibility.Visible;
                        head_occupation_Textbox.BorderBrush = Brushes.DarkGray;
                        head_occupation_Textbox.BorderThickness = new Thickness(1);
                        head_occupation_Textbox.IsReadOnly = true;

                        head_relation_border.Visibility = Visibility.Visible;
                        head_relation_border.BorderBrush = Brushes.DarkGray;
                        head_relation_border.BorderThickness = new Thickness(1);
                        head_relation_Textbox.IsEnabled = false;

                        head_pwd_border.Visibility = Visibility.Visible;
                        head_pwd_border.BorderBrush = Brushes.DarkGray;
                        head_pwd_border.BorderThickness = new Thickness(1);
                        head_pwd_Textbox.IsEnabled = false;

                        head_ip_border.Visibility = Visibility.Visible;
                        head_ip_border.BorderBrush = Brushes.DarkGray;
                        head_ip_border.BorderThickness = new Thickness(1);
                        head_ip_Textbox.IsEnabled = false;

                        head_philhealth_border.Visibility = Visibility.Visible;
                        head_philhealth_border.BorderBrush = Brushes.DarkGray;
                        head_philhealth_border.BorderThickness = new Thickness(1);
                        head_philhealth_Textbox.IsEnabled = false;

                        head_breast_feeding_border.Visibility = Visibility.Visible;
                        head_breast_feeding_border.BorderBrush = Brushes.DarkGray;
                        head_breast_feeding_border.BorderThickness = new Thickness(1);
                        head_breast_feeding_Textbox.IsEnabled = false;

                        head_ntp_border.Visibility = Visibility.Visible;
                        head_ntp_border.BorderBrush = Brushes.DarkGray;
                        head_ntp_border.BorderThickness = new Thickness(1);
                        head_ntp_Textbox.IsEnabled = false;

                        head_smooking_border.Visibility = Visibility.Visible;
                        head_smooking_border.BorderBrush = Brushes.DarkGray;
                        head_smooking_border.BorderThickness = new Thickness(1);
                        head_smooking_Textbox.IsEnabled = false;

                        head_fourps_border.Visibility = Visibility.Visible;
                        head_fourps_border.BorderBrush = Brushes.DarkGray;
                        head_fourps_border.BorderThickness = new Thickness(1);
                        head_fourps_Textbox.IsEnabled = false;

                        head_first_name_Textbox.Focus();
                        break;

                    case MessageBoxResult.Cancel:
                        break;
                }
            }

        }

        private void Edit_data_member_information_btn_Click(object sender, RoutedEventArgs e)
        {
            newMemberImage.Source = new BitmapImage(new Uri(@"img/New Member Icon.png", UriKind.Relative));
            new_Member_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FFDDDDDD");
            new_Member_btn.IsEnabled = true;
            new_Member_btn.BorderThickness = new Thickness(1);
            new_Member_btn.BorderBrush = Brushes.DarkGray;
            new_Member_btn.Cursor = Cursors.Hand;

            deleteColumn.Visibility = Visibility.Visible;

            memberFirstNameRequired.Visibility = Visibility.Visible;
            memberMiddleNameRequired.Visibility = Visibility.Visible;
            memberLastNameRequired.Visibility = Visibility.Visible;

            edit_data_member_information_btn.Visibility = Visibility.Hidden;
            update_data_member_information_btn.Visibility = Visibility.Visible;
            cancel_member_information_btn.Visibility = Visibility.Visible;

            member_first_name_textbox.Visibility = Visibility.Visible;
            member_first_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_first_name_textbox.BorderThickness = new Thickness(2);
            member_first_name_textbox.IsReadOnly = false;

            member_middle_name_textbox.Visibility = Visibility.Visible;
            member_middle_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_middle_name_textbox.BorderThickness = new Thickness(2);
            member_middle_name_textbox.IsReadOnly = false;

            member_last_name_textbox.Visibility = Visibility.Visible;
            member_last_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_last_name_textbox.BorderThickness = new Thickness(2);
            member_last_name_textbox.IsReadOnly = false;

            head_suffix_border.Visibility = Visibility.Visible;
            head_suffix_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            head_suffix_border.BorderThickness = new Thickness(2);
            head_suffix_Textbox.IsEnabled = true;

            member_dependency_border.Visibility = Visibility.Visible;
            member_dependency_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_dependency_border.BorderThickness = new Thickness(2);
            member_dependency_textbox.IsEnabled = true;

            member_tribe_border.Visibility = Visibility.Visible;
            member_tribe_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_tribe_border.BorderThickness = new Thickness(2);
            member_tribe_textbox.IsEnabled = true;

            member_sex_border.Visibility = Visibility.Visible;
            member_sex_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_sex_border.BorderThickness = new Thickness(2);
            member_sex_textbox.IsEnabled = true;

            member_bdate_textbox.Visibility = Visibility.Visible;
            member_bdate_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_bdate_textbox.BorderThickness = new Thickness(2);
            member_bdate_textbox.IsEnabled = true;

            member_religion_border.Visibility = Visibility.Visible;
            member_religion_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_religion_border.BorderThickness = new Thickness(2);
            member_religion_textbox.IsEnabled = true;

            member_education_border.Visibility = Visibility.Visible;
            member_education_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_education_border.BorderThickness = new Thickness(2);
            member_education_textbox.IsEnabled = true;

            member_age_textbox.Visibility = Visibility.Visible;
            member_age_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_age_textbox.BorderThickness = new Thickness(2);
            member_education_textbox.IsReadOnly = false;

            member_occupation_textbox.Visibility = Visibility.Visible;
            member_occupation_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_occupation_textbox.BorderThickness = new Thickness(2);
            member_occupation_textbox.IsReadOnly = false;

            member_relationship_border.Visibility = Visibility.Visible;
            member_relationship_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_relationship_border.BorderThickness = new Thickness(2);
            member_relationship_textbox.IsEnabled = true;

            member_pwd_border.Visibility = Visibility.Visible;
            member_pwd_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_pwd_border.BorderThickness = new Thickness(2);
            member_pwd_textbox.IsEnabled = true;

            member_ip_border.Visibility = Visibility.Visible;
            member_ip_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_ip_border.BorderThickness = new Thickness(2);
            member_ip_textbox.IsEnabled = true;

            member_philhealth_border.Visibility = Visibility.Visible;
            member_philhealth_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_philhealth_border.BorderThickness = new Thickness(2);
            member_philhealth_textbox.IsEnabled = true;

            member_breast_feeding_border.Visibility = Visibility.Visible;
            member_breast_feeding_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_breast_feeding_border.BorderThickness = new Thickness(2);
            member_breast_feeding_textbox.IsEnabled = true;

            member_ntp_border.Visibility = Visibility.Visible;
            member_ntp_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_ntp_border.BorderThickness = new Thickness(2);
            member_ntp_textbox.IsEnabled = true;

            member_smooking_border.Visibility = Visibility.Visible;
            member_smooking_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_smooking_border.BorderThickness = new Thickness(2);
            member_smooking_textbox.IsEnabled = true;

            member_fourps_border.Visibility = Visibility.Visible;
            member_fourps_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_fourps_border.BorderThickness = new Thickness(2);
            member_fourps_textbox.IsEnabled = true;
        }

        private void Update_data_member_information_btn_Click(object sender, RoutedEventArgs e)
        {
            //checking empty member input box
            if (String.IsNullOrEmpty(member_first_name_textbox.Text) || String.IsNullOrEmpty(member_middle_name_textbox.Text) || String.IsNullOrEmpty(member_last_name_textbox.Text))
            {
                MessageBox.Show(this, "Name field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                //member first name
                if (member_first_name_textbox.Text == "")
                {
                    member_first_name_textbox.BorderBrush = Brushes.Red;

                    member_first_name_textbox.Focus();

                    if (member_middle_name_textbox.Text == "")
                    {
                        member_middle_name_textbox.BorderBrush = Brushes.Red;
                    }

                    if (member_last_name_textbox.Text == "")
                    {
                        member_last_name_textbox.BorderBrush = Brushes.Red;
                    }

                    if (member_middle_name_textbox.Text != "")
                    {
                        member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                    }

                    if (member_last_name_textbox.Text != "")
                    {
                        member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                    }
                }
                //

                //member middle name
                else if (member_middle_name_textbox.Text == "")
                {
                    member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_middle_name_textbox.BorderBrush = Brushes.Red;

                    member_middle_name_textbox.Focus();

                    if (member_last_name_textbox.Text == "")
                    {
                        member_last_name_textbox.BorderBrush = Brushes.Red;
                    }

                    else
                    {
                        member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                    }
                }
                //

                //member last name
                else if (member_last_name_textbox.Text == "")
                {
                    member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_last_name_textbox.BorderBrush = Brushes.Red;

                    member_last_name_textbox.Focus();
                }
                //
            }
            //end checking

            else
            {
                if (viewClick == 1)
                {
                    MessageBoxResult UpdateMemberConfirmationResult = MessageBox.Show("Do you want to update this Information?", "Confirmation", MessageBoxButton.OKCancel);

                    switch (UpdateMemberConfirmationResult)
                    {
                        case MessageBoxResult.OK:

                            //Inserting Household Information to household Table
                            connection.Open();
                            SqlCommand updateMemberInformationCMD = new SqlCommand();
                            updateMemberInformationCMD.Connection = connection;
                            updateMemberInformationCMD.CommandText = "UPDATE familyMembers SET family_member_household_id = @member_household_id, full_name = @member_first_name + ' ' + @member_middle_name + ' ' + @member_last_name + ' ' + @member_suffix, " +
                                "first_name = @member_first_name, middle_name = @member_middle_name, last_name = @member_last_name, suffix = @member_suffix, dependency = @member_dependency, tribe = @member_tribe, sex = @member_sex, " +
                                "bdate = @member_bdate, age = @member_age, religion = @member_religion, education = @member_education, occupation = @member_occupation, relationship = @member_relationship, " +
                                "pwd = @member_pwd, ip = @member_ip, philhealth = @member_philhealth, breast_feeding = @member_breast_feeding, ntp = @member_ntp, smooking = @member_smooking, fourps = @member_fourps WHERE family_member_id = @updateFirstMemberID";
                            updateMemberInformationCMD.Parameters.AddWithValue("@updateFirstMemberID", SelectedViewMember);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_household_id", selectedIDhouseID);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_first_name", member_first_name_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_middle_name", member_middle_name_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_last_name", member_last_name_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_suffix", member_suffix_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_dependency", member_dependency_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_tribe", member_tribe_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_sex", member_sex_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_bdate", member_bdate_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_age", member_age_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_religion", member_religion_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_education", member_education_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_occupation", member_occupation_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_relationship", member_relationship_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_pwd", member_pwd_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_ip", member_ip_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_philhealth", member_philhealth_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_breast_feeding", member_breast_feeding_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_ntp", member_ntp_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_smooking", member_smooking_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_fourps", member_fourps_textbox.Text);
                            SqlDataAdapter updateMemberInformationDA = new SqlDataAdapter(updateMemberInformationCMD);
                            DataTable updateMemberInformationDT = new DataTable();
                            updateMemberInformationDA.Fill(updateMemberInformationDT);
                            connection.Close();

                            MessageBox.Show("information had been updated successfully!");

                            //refresh datagrid member after deletion
                            connection.Open();
                            string refreshDatagridAfterUpdate = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                            SqlCommand refreshDatagridAfterUpdateCMD = new SqlCommand(refreshDatagridAfterUpdate, connection);
                            refreshDatagridAfterUpdateCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                            refreshDatagridAfterUpdateCMD.ExecuteNonQuery();
                            SqlDataAdapter refreshDatagridAfterUpdateDA = new SqlDataAdapter(refreshDatagridAfterUpdateCMD);
                            DataTable refreshDatagridAfterUpdateDT = new DataTable("familyMembers");
                            refreshDatagridAfterUpdateDA.Fill(refreshDatagridAfterUpdateDT);
                            member_dataGrid.ItemsSource = refreshDatagridAfterUpdateDT.DefaultView;
                            refreshDatagridAfterUpdateDA.Update(refreshDatagridAfterUpdateDT);
                            connection.Close();

                            memberFirstNameRequired.Visibility = Visibility.Hidden;
                            memberMiddleNameRequired.Visibility = Visibility.Hidden;
                            memberLastNameRequired.Visibility = Visibility.Hidden;

                            member_first_name_textbox.Visibility = Visibility.Visible;
                            member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                            member_first_name_textbox.BorderThickness = new Thickness(1);
                            member_first_name_textbox.IsReadOnly = true;

                            member_middle_name_textbox.Visibility = Visibility.Visible;
                            member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                            member_middle_name_textbox.BorderThickness = new Thickness(1);
                            member_middle_name_textbox.IsReadOnly = true;

                            member_last_name_textbox.Visibility = Visibility.Visible;
                            member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                            member_last_name_textbox.BorderThickness = new Thickness(1);
                            member_last_name_textbox.IsReadOnly = true;

                            head_suffix_border.Visibility = Visibility.Visible;
                            head_suffix_border.BorderBrush = Brushes.DarkGray;
                            head_suffix_border.BorderThickness = new Thickness(1);
                            head_suffix_Textbox.IsEnabled = false;

                            member_dependency_border.Visibility = Visibility.Visible;
                            member_dependency_border.BorderBrush = Brushes.DarkGray;
                            member_dependency_border.BorderThickness = new Thickness(1);
                            member_dependency_textbox.IsEnabled = false;

                            member_tribe_border.Visibility = Visibility.Visible;
                            member_tribe_border.BorderBrush = Brushes.DarkGray;
                            member_tribe_border.BorderThickness = new Thickness(1);
                            member_tribe_textbox.IsEnabled = false;

                            member_sex_border.Visibility = Visibility.Visible;
                            member_sex_border.BorderBrush = Brushes.DarkGray;
                            member_sex_border.BorderThickness = new Thickness(1);
                            member_sex_textbox.IsEnabled = false;

                            member_bdate_textbox.Visibility = Visibility.Visible;
                            member_bdate_textbox.BorderBrush = Brushes.DarkGray;
                            member_bdate_textbox.BorderThickness = new Thickness(1);
                            member_bdate_textbox.IsEnabled = false;

                            member_religion_border.Visibility = Visibility.Visible;
                            member_religion_border.BorderBrush = Brushes.DarkGray;
                            member_religion_border.BorderThickness = new Thickness(1);
                            member_religion_textbox.IsEnabled = false;

                            member_education_border.Visibility = Visibility.Visible;
                            member_education_border.BorderBrush = Brushes.DarkGray;
                            member_education_border.BorderThickness = new Thickness(1);
                            member_education_textbox.IsEnabled = false;

                            member_age_textbox.Visibility = Visibility.Visible;
                            member_age_textbox.BorderBrush = Brushes.DarkGray;
                            member_age_textbox.BorderThickness = new Thickness(1);
                            member_age_textbox.IsReadOnly = true;

                            member_occupation_textbox.Visibility = Visibility.Visible;
                            member_occupation_textbox.BorderBrush = Brushes.DarkGray;
                            member_occupation_textbox.BorderThickness = new Thickness(1);
                            member_occupation_textbox.IsReadOnly = true;

                            member_relationship_border.Visibility = Visibility.Visible;
                            member_relationship_border.BorderBrush = Brushes.DarkGray;
                            member_relationship_border.BorderThickness = new Thickness(1);
                            member_relationship_textbox.IsEnabled = false;

                            member_pwd_border.Visibility = Visibility.Visible;
                            member_pwd_border.BorderBrush = Brushes.DarkGray;
                            member_pwd_border.BorderThickness = new Thickness(1);
                            member_pwd_textbox.IsEnabled = false;

                            member_ip_border.Visibility = Visibility.Visible;
                            member_ip_border.BorderBrush = Brushes.DarkGray;
                            member_ip_border.BorderThickness = new Thickness(1);
                            member_ip_textbox.IsEnabled = false;

                            member_philhealth_border.Visibility = Visibility.Visible;
                            member_philhealth_border.BorderBrush = Brushes.DarkGray;
                            member_philhealth_border.BorderThickness = new Thickness(1);
                            member_philhealth_textbox.IsEnabled = false;

                            member_breast_feeding_border.Visibility = Visibility.Visible;
                            member_breast_feeding_border.BorderBrush = Brushes.DarkGray;
                            member_breast_feeding_border.BorderThickness = new Thickness(1);
                            member_breast_feeding_textbox.IsEnabled = false;

                            member_ntp_border.Visibility = Visibility.Visible;
                            member_ntp_border.BorderBrush = Brushes.DarkGray;
                            member_ntp_border.BorderThickness = new Thickness(1);
                            member_ntp_textbox.IsEnabled = false;

                            member_smooking_border.Visibility = Visibility.Visible;
                            member_smooking_border.BorderBrush = Brushes.DarkGray;
                            member_smooking_border.BorderThickness = new Thickness(1);
                            member_smooking_textbox.IsEnabled = false;

                            member_fourps_border.Visibility = Visibility.Visible;
                            member_fourps_border.BorderBrush = Brushes.DarkGray;
                            member_fourps_border.BorderThickness = new Thickness(1);
                            member_fourps_textbox.IsEnabled = false;

                            viewColumn.Visibility = Visibility.Visible;
                            deleteColumn.Visibility = Visibility.Hidden;
                            disabledDeleteColumn.Visibility = Visibility.Hidden;
                            disabledViewColumn.Visibility = Visibility.Hidden;

                            cancel_new_member_information_btn.Visibility = Visibility.Hidden;
                            new_Member_btn.Visibility = Visibility.Visible;
                            add_Member_btn.Visibility = Visibility.Hidden;
                            cancel_new_member_information_btn.Visibility = Visibility.Hidden;


                            edit_data_member_information_btn.Visibility = Visibility.Visible;
                            update_data_member_information_btn.Visibility = Visibility.Hidden;
                            cancel_member_information_btn.Visibility = Visibility.Hidden;

                            newMemberImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                            new_Member_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                            new_Member_btn.IsEnabled = false;
                            new_Member_btn.BorderThickness = new Thickness(1);
                            new_Member_btn.BorderBrush = Brushes.Black;
                            new_Member_btn.Cursor = Cursors.Arrow;
                            break;

                        case MessageBoxResult.Cancel:
                            break;
                    }
                }

                else
                {

                    //getting first family member
                    SqlConnection getFirstMemberIDConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    getFirstMemberIDConnection.Open();
                    SqlCommand getFirstMemberIDCMD = new SqlCommand();
                    getFirstMemberIDCMD.Connection = getFirstMemberIDConnection;
                    getFirstMemberIDCMD.CommandText = "SELECT TOP 1 * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                    getFirstMemberIDCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    getFirstMemberIDCMD.ExecuteNonQuery();

                    SqlDataReader getFirstMemberIDDR = getFirstMemberIDCMD.ExecuteReader();
                    while (getFirstMemberIDDR.Read())
                    {
                        updateFirstMemberID = getFirstMemberIDDR.GetValue(0).ToString();

                    }
                    getFirstMemberIDDR.Close();
                    getFirstMemberIDConnection.Close();

                    MessageBoxResult UpdateMemberConfirmationResult = MessageBox.Show("Do you want to update this Member Information?", "Confirmation", MessageBoxButton.OKCancel);

                    switch (UpdateMemberConfirmationResult)
                    {
                        case MessageBoxResult.OK:
                            //Inserting Household Information to household Table
                            connection.Open();
                            SqlCommand updateMemberInformationCMD = new SqlCommand();
                            updateMemberInformationCMD.Connection = connection;
                            updateMemberInformationCMD.CommandText = "UPDATE familyMembers SET family_member_household_id = @member_household_id, full_name = @member_first_name + ' ' + @member_middle_name + ' ' + @member_last_name + ' ' + @member_suffix, " +
                                "first_name = @member_first_name, middle_name = @member_middle_name, last_name = @member_last_name, suffix = @member_suffix, dependency = @member_dependency, tribe = @member_tribe, sex = @member_sex, " +
                                "bdate = @member_bdate, age = @member_age, religion = @member_religion, education = @member_education, occupation = @member_occupation, relationship = @member_relationship, " +
                                "pwd = @member_pwd, ip = @member_ip, philhealth = @member_philhealth, breast_feeding = @member_breast_feeding, ntp = @member_ntp, smooking = @member_smooking, fourps = @member_fourps WHERE family_member_id = @updateFirstMemberID";
                            updateMemberInformationCMD.Parameters.AddWithValue("@updateFirstMemberID", updateFirstMemberID);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_household_id", selectedIDhouseID);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_first_name", member_first_name_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_middle_name", member_middle_name_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_last_name", member_last_name_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_suffix", member_suffix_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_dependency", member_dependency_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_tribe", member_tribe_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_sex", member_sex_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_bdate", member_bdate_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_age", member_age_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_religion", member_religion_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_education", member_education_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_occupation", member_occupation_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_relationship", member_relationship_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_pwd", member_pwd_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_ip", member_ip_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_philhealth", member_philhealth_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_breast_feeding", member_breast_feeding_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_ntp", member_ntp_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_smooking", member_smooking_textbox.Text);
                            updateMemberInformationCMD.Parameters.AddWithValue("@member_fourps", member_fourps_textbox.Text);
                            SqlDataAdapter updateMemberInformationDA = new SqlDataAdapter(updateMemberInformationCMD);
                            DataTable updateMemberInformationDT = new DataTable();
                            updateMemberInformationDA.Fill(updateMemberInformationDT);
                            connection.Close();

                            MessageBox.Show("Member information had been updated successfully!");

                            //refresh datagrid member after deletion
                            connection.Open();
                            string refreshDatagridAfterUpdate = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                            SqlCommand refreshDatagridAfterUpdateCMD = new SqlCommand(refreshDatagridAfterUpdate, connection);
                            refreshDatagridAfterUpdateCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                            refreshDatagridAfterUpdateCMD.ExecuteNonQuery();
                            SqlDataAdapter refreshDatagridAfterUpdateDA = new SqlDataAdapter(refreshDatagridAfterUpdateCMD);
                            DataTable refreshDatagridAfterUpdateDT = new DataTable("familyMembers");
                            refreshDatagridAfterUpdateDA.Fill(refreshDatagridAfterUpdateDT);
                            member_dataGrid.ItemsSource = refreshDatagridAfterUpdateDT.DefaultView;
                            refreshDatagridAfterUpdateDA.Update(refreshDatagridAfterUpdateDT);
                            connection.Close();

                            memberFirstNameRequired.Visibility = Visibility.Hidden;
                            memberMiddleNameRequired.Visibility = Visibility.Hidden;
                            memberLastNameRequired.Visibility = Visibility.Hidden;

                            member_first_name_textbox.Visibility = Visibility.Visible;
                            member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                            member_first_name_textbox.BorderThickness = new Thickness(1);
                            member_first_name_textbox.IsReadOnly = true;

                            member_middle_name_textbox.Visibility = Visibility.Visible;
                            member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                            member_middle_name_textbox.BorderThickness = new Thickness(1);
                            member_middle_name_textbox.IsReadOnly = true;

                            member_last_name_textbox.Visibility = Visibility.Visible;
                            member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                            member_last_name_textbox.BorderThickness = new Thickness(1);
                            member_last_name_textbox.IsReadOnly = true;

                            head_suffix_border.Visibility = Visibility.Visible;
                            head_suffix_border.BorderBrush = Brushes.DarkGray;
                            head_suffix_border.BorderThickness = new Thickness(1);
                            head_suffix_Textbox.IsEnabled = false;

                            member_dependency_border.Visibility = Visibility.Visible;
                            member_dependency_border.BorderBrush = Brushes.DarkGray;
                            member_dependency_border.BorderThickness = new Thickness(1);
                            member_dependency_textbox.IsEnabled = false;

                            member_tribe_border.Visibility = Visibility.Visible;
                            member_tribe_border.BorderBrush = Brushes.DarkGray;
                            member_tribe_border.BorderThickness = new Thickness(1);
                            member_tribe_textbox.IsEnabled = false;

                            member_sex_border.Visibility = Visibility.Visible;
                            member_sex_border.BorderBrush = Brushes.DarkGray;
                            member_sex_border.BorderThickness = new Thickness(1);
                            member_sex_textbox.IsEnabled = false;

                            member_bdate_textbox.Visibility = Visibility.Visible;
                            member_bdate_textbox.BorderBrush = Brushes.DarkGray;
                            member_bdate_textbox.BorderThickness = new Thickness(1);
                            member_bdate_textbox.IsEnabled = false;

                            member_religion_border.Visibility = Visibility.Visible;
                            member_religion_border.BorderBrush = Brushes.DarkGray;
                            member_religion_border.BorderThickness = new Thickness(1);
                            member_religion_textbox.IsEnabled = false;

                            member_education_border.Visibility = Visibility.Visible;
                            member_education_border.BorderBrush = Brushes.DarkGray;
                            member_education_border.BorderThickness = new Thickness(1);
                            member_education_textbox.IsEnabled = false;

                            member_age_textbox.Visibility = Visibility.Visible;
                            member_age_textbox.BorderBrush = Brushes.DarkGray;
                            member_age_textbox.BorderThickness = new Thickness(1);
                            member_age_textbox.IsReadOnly = true;

                            member_occupation_textbox.Visibility = Visibility.Visible;
                            member_occupation_textbox.BorderBrush = Brushes.DarkGray;
                            member_occupation_textbox.BorderThickness = new Thickness(1);
                            member_occupation_textbox.IsReadOnly = true;

                            member_relationship_border.Visibility = Visibility.Visible;
                            member_relationship_border.BorderBrush = Brushes.DarkGray;
                            member_relationship_border.BorderThickness = new Thickness(1);
                            member_relationship_textbox.IsEnabled = false;

                            member_pwd_border.Visibility = Visibility.Visible;
                            member_pwd_border.BorderBrush = Brushes.DarkGray;
                            member_pwd_border.BorderThickness = new Thickness(1);
                            member_pwd_textbox.IsEnabled = false;

                            member_ip_border.Visibility = Visibility.Visible;
                            member_ip_border.BorderBrush = Brushes.DarkGray;
                            member_ip_border.BorderThickness = new Thickness(1);
                            member_ip_textbox.IsEnabled = false;

                            member_philhealth_border.Visibility = Visibility.Visible;
                            member_philhealth_border.BorderBrush = Brushes.DarkGray;
                            member_philhealth_border.BorderThickness = new Thickness(1);
                            member_philhealth_textbox.IsEnabled = false;

                            member_breast_feeding_border.Visibility = Visibility.Visible;
                            member_breast_feeding_border.BorderBrush = Brushes.DarkGray;
                            member_breast_feeding_border.BorderThickness = new Thickness(1);
                            member_breast_feeding_textbox.IsEnabled = false;

                            member_ntp_border.Visibility = Visibility.Visible;
                            member_ntp_border.BorderBrush = Brushes.DarkGray;
                            member_ntp_border.BorderThickness = new Thickness(1);
                            member_ntp_textbox.IsEnabled = false;

                            member_smooking_border.Visibility = Visibility.Visible;
                            member_smooking_border.BorderBrush = Brushes.DarkGray;
                            member_smooking_border.BorderThickness = new Thickness(1);
                            member_smooking_textbox.IsEnabled = false;

                            member_fourps_border.Visibility = Visibility.Visible;
                            member_fourps_border.BorderBrush = Brushes.DarkGray;
                            member_fourps_border.BorderThickness = new Thickness(1);
                            member_fourps_textbox.IsEnabled = false;

                            viewColumn.Visibility = Visibility.Visible;
                            deleteColumn.Visibility = Visibility.Hidden;
                            disabledDeleteColumn.Visibility = Visibility.Hidden;
                            disabledViewColumn.Visibility = Visibility.Hidden;

                            cancel_new_member_information_btn.Visibility = Visibility.Hidden;
                            new_Member_btn.Visibility = Visibility.Visible;
                            add_Member_btn.Visibility = Visibility.Hidden;
                            cancel_new_member_information_btn.Visibility = Visibility.Hidden;


                            edit_data_member_information_btn.Visibility = Visibility.Visible;
                            update_data_member_information_btn.Visibility = Visibility.Hidden;
                            cancel_member_information_btn.Visibility = Visibility.Hidden;

                            newMemberImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                            new_Member_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                            new_Member_btn.IsEnabled = false;
                            new_Member_btn.BorderThickness = new Thickness(1);
                            new_Member_btn.BorderBrush = Brushes.Black;
                            new_Member_btn.Cursor = Cursors.Arrow;
                            break;

                        case MessageBoxResult.Cancel:
                            break;
                    }
                }
            }

        }

        private void Cancel_member_information_btn_Click(object sender, RoutedEventArgs e)
        {
            newMemberImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
            new_Member_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
            new_Member_btn.IsEnabled = false;
            new_Member_btn.BorderThickness = new Thickness(1);
            new_Member_btn.BorderBrush = Brushes.Black;
            new_Member_btn.Cursor = Cursors.Arrow;

            updateImageMemberInformation.Source = new BitmapImage(new Uri(@"img/Update Icon.png", UriKind.Relative));
            update_data_member_information_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            update_data_member_information_btn.IsEnabled = true;
            update_data_member_information_btn.BorderThickness = new Thickness(1);
            update_data_member_information_btn.BorderBrush = Brushes.DarkGray;
            update_data_member_information_btn.Cursor = Cursors.Hand;
            updateMemberInformationTextBlock.Foreground = Brushes.White;

            member_first_name_textbox.Visibility = Visibility.Visible;
            member_first_name_textbox.BorderBrush = Brushes.DarkGray;
            member_first_name_textbox.BorderThickness = new Thickness(1);

            member_middle_name_textbox.Visibility = Visibility.Visible;
            member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
            member_middle_name_textbox.BorderThickness = new Thickness(1);

            member_last_name_textbox.Visibility = Visibility.Visible;
            member_last_name_textbox.BorderBrush = Brushes.DarkGray;
            member_last_name_textbox.BorderThickness = new Thickness(1);


            viewClick = 0;

            memberFirstNameRequired.Visibility = Visibility.Hidden;
            memberMiddleNameRequired.Visibility = Visibility.Hidden;
            memberLastNameRequired.Visibility = Visibility.Hidden;

            viewColumn.Visibility = Visibility.Visible;
            deleteColumn.Visibility = Visibility.Hidden;
            disabledDeleteColumn.Visibility = Visibility.Hidden;
            disabledViewColumn.Visibility = Visibility.Hidden;

            member_first_name_textbox.Text = firstMemberFirstName;
            member_middle_name_textbox.Text = firstMemberMiddleName;
            member_last_name_textbox.Text = firstMemberLastName;
            member_suffix_textbox.Text = firstMemberSuffix;
            member_dependency_textbox.Text = firstMemberDependency;
            member_tribe_textbox.Text = firstMemberTribe;
            member_sex_textbox.Text = firstMemberSex;
            member_bdate_textbox.Text = firstMemberBirthDate;
            member_religion_textbox.Text = firstMemberReligion;
            member_education_textbox.Text = firstMemberEducation;
            member_age_textbox.Text = firstMemberAge;
            member_occupation_textbox.Text = firstMemberOccupation;
            member_relationship_textbox.Text = firstMemberRelationship;
            member_pwd_textbox.Text = firstMemberPWD;
            member_ip_textbox.Text = firstMemberIP;
            member_philhealth_textbox.Text = firstMemberPhilhealth;
            member_breast_feeding_textbox.Text = firstMemberBreastFeeding;
            member_ntp_textbox.Text = firstMemberNTP;
            member_smooking_textbox.Text = firstMemberSmooking;
            member_fourps_textbox.Text = firstMemberFourps;

            cancel_new_member_information_btn.Visibility = Visibility.Hidden;
            new_Member_btn.Visibility = Visibility.Visible;
            add_Member_btn.Visibility = Visibility.Hidden;
            cancel_new_member_information_btn.Visibility = Visibility.Hidden;


            edit_data_member_information_btn.Visibility = Visibility.Visible;
            update_data_member_information_btn.Visibility = Visibility.Hidden;
            cancel_member_information_btn.Visibility = Visibility.Hidden;

            member_first_name_textbox.Visibility = Visibility.Visible;
            member_first_name_textbox.BorderBrush = Brushes.DarkGray;
            member_first_name_textbox.BorderThickness = new Thickness(1);
            member_first_name_textbox.IsReadOnly = true;

            member_middle_name_textbox.Visibility = Visibility.Visible;
            member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
            member_middle_name_textbox.BorderThickness = new Thickness(1);
            member_middle_name_textbox.IsReadOnly = true;

            member_last_name_textbox.Visibility = Visibility.Visible;
            member_last_name_textbox.BorderBrush = Brushes.DarkGray;
            member_last_name_textbox.BorderThickness = new Thickness(1);
            member_last_name_textbox.IsReadOnly = true;

            head_suffix_border.Visibility = Visibility.Visible;
            head_suffix_border.BorderBrush = Brushes.DarkGray;
            head_suffix_border.BorderThickness = new Thickness(1);
            head_suffix_Textbox.IsEnabled = false;

            member_dependency_border.Visibility = Visibility.Visible;
            member_dependency_border.BorderBrush = Brushes.DarkGray;
            member_dependency_border.BorderThickness = new Thickness(1);
            member_dependency_textbox.IsEnabled = false;

            member_tribe_border.Visibility = Visibility.Visible;
            member_tribe_border.BorderBrush = Brushes.DarkGray;
            member_tribe_border.BorderThickness = new Thickness(1);
            member_tribe_textbox.IsEnabled = false;

            member_sex_border.Visibility = Visibility.Visible;
            member_sex_border.BorderBrush = Brushes.DarkGray;
            member_sex_border.BorderThickness = new Thickness(1);
            member_sex_textbox.IsEnabled = false;

            member_bdate_textbox.Visibility = Visibility.Visible;
            member_bdate_textbox.BorderBrush = Brushes.DarkGray;
            member_bdate_textbox.BorderThickness = new Thickness(1);
            member_bdate_textbox.IsEnabled = false;

            member_religion_border.Visibility = Visibility.Visible;
            member_religion_border.BorderBrush = Brushes.DarkGray;
            member_religion_border.BorderThickness = new Thickness(1);
            member_religion_textbox.IsEnabled = false;

            member_education_border.Visibility = Visibility.Visible;
            member_education_border.BorderBrush = Brushes.DarkGray;
            member_education_border.BorderThickness = new Thickness(1);
            member_education_textbox.IsEnabled = false;

            member_age_textbox.Visibility = Visibility.Visible;
            member_age_textbox.BorderBrush = Brushes.DarkGray;
            member_age_textbox.BorderThickness = new Thickness(1);
            member_age_textbox.IsReadOnly = true;

            member_occupation_textbox.Visibility = Visibility.Visible;
            member_occupation_textbox.BorderBrush = Brushes.DarkGray;
            member_occupation_textbox.BorderThickness = new Thickness(1);
            member_occupation_textbox.IsReadOnly = true;

            member_relationship_border.Visibility = Visibility.Visible;
            member_relationship_border.BorderBrush = Brushes.DarkGray;
            member_relationship_border.BorderThickness = new Thickness(1);
            member_relationship_textbox.IsEnabled = false;

            member_pwd_border.Visibility = Visibility.Visible;
            member_pwd_border.BorderBrush = Brushes.DarkGray;
            member_pwd_border.BorderThickness = new Thickness(1);
            member_pwd_textbox.IsEnabled = false;

            member_ip_border.Visibility = Visibility.Visible;
            member_ip_border.BorderBrush = Brushes.DarkGray;
            member_ip_border.BorderThickness = new Thickness(1);
            member_ip_textbox.IsEnabled = false;

            member_philhealth_border.Visibility = Visibility.Visible;
            member_philhealth_border.BorderBrush = Brushes.DarkGray;
            member_philhealth_border.BorderThickness = new Thickness(1);
            member_philhealth_textbox.IsEnabled = false;

            member_breast_feeding_border.Visibility = Visibility.Visible;
            member_breast_feeding_border.BorderBrush = Brushes.DarkGray;
            member_breast_feeding_border.BorderThickness = new Thickness(1);
            member_breast_feeding_textbox.IsEnabled = false;

            member_ntp_border.Visibility = Visibility.Visible;
            member_ntp_border.BorderBrush = Brushes.DarkGray;
            member_ntp_border.BorderThickness = new Thickness(1);
            member_ntp_textbox.IsEnabled = false;

            member_smooking_border.Visibility = Visibility.Visible;
            member_smooking_border.BorderBrush = Brushes.DarkGray;
            member_smooking_border.BorderThickness = new Thickness(1);
            member_smooking_textbox.IsEnabled = false;

            member_fourps_border.Visibility = Visibility.Visible;
            member_fourps_border.BorderBrush = Brushes.DarkGray;
            member_fourps_border.BorderThickness = new Thickness(1);
            member_fourps_textbox.IsEnabled = false;
        }

        private void member_delete_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedDeleteRow = member_dataGrid.SelectedItem as DataRowView;
            string selectedDeleteRow_id = getSelectedDeleteRow.Row[0].ToString();

            MessageBoxResult DeleteConfirmationResult = MessageBox.Show("Do you want to delete this Member?", "Confirmation", MessageBoxButton.YesNo);

            switch (DeleteConfirmationResult)
            {
                case MessageBoxResult.Yes:
                    //deleting Head of the Family
                    connection.Open();
                    SqlCommand deleteMemberCMD = new SqlCommand();
                    deleteMemberCMD.Connection = connection;
                    deleteMemberCMD.CommandText = "DELETE FROM familyMembers WHERE family_member_id=@deleteMemberID";
                    deleteMemberCMD.Parameters.AddWithValue("@deleteMemberID", selectedDeleteRow_id);
                    SqlDataAdapter deleteMemberDA = new SqlDataAdapter(deleteMemberCMD);
                    DataTable deleteMemberDT = new DataTable();
                    deleteMemberDA.Fill(deleteMemberDT);
                    connection.Close();

                    MessageBox.Show("Member had been deleted Successfully");

                    //refresh datagrid member after deletion
                    connection.Open();
                    string refreshMemberDatagridDelete = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                    SqlCommand refreshMemberDatagridDeleteCMD = new SqlCommand(refreshMemberDatagridDelete, connection);
                    refreshMemberDatagridDeleteCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    refreshMemberDatagridDeleteCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshMemberDatagridDeleteDA = new SqlDataAdapter(refreshMemberDatagridDeleteCMD);
                    DataTable refreshMemberDatagridDeleteDT = new DataTable("familyMembers");
                    refreshMemberDatagridDeleteDA.Fill(refreshMemberDatagridDeleteDT);
                    member_dataGrid.ItemsSource = refreshMemberDatagridDeleteDT.DefaultView;
                    refreshMemberDatagridDeleteDA.Update(refreshMemberDatagridDeleteDT);
                    connection.Close();

                    //getting first family member
                    SqlConnection getFirstMemberAfterDeleteConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    getFirstMemberAfterDeleteConnection.Open();
                    SqlCommand getFirstMemberAfterDeleteCMD = new SqlCommand();
                    getFirstMemberAfterDeleteCMD.Connection = getFirstMemberAfterDeleteConnection;
                    getFirstMemberAfterDeleteCMD.CommandText = "SELECT TOP 1 * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                    getFirstMemberAfterDeleteCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    getFirstMemberAfterDeleteCMD.ExecuteNonQuery();

                    SqlDataReader getFirstMemberAfterDeleteDR = getFirstMemberAfterDeleteCMD.ExecuteReader();
                    while (getFirstMemberAfterDeleteDR.Read())
                    {
                        firstMemberFirstName = getFirstMemberAfterDeleteDR.GetValue(3).ToString();
                        firstMemberMiddleName = getFirstMemberAfterDeleteDR.GetValue(4).ToString();
                        firstMemberLastName = getFirstMemberAfterDeleteDR.GetValue(5).ToString();
                        firstMemberSuffix = getFirstMemberAfterDeleteDR.GetValue(6).ToString();
                        firstMemberDependency = getFirstMemberAfterDeleteDR.GetValue(8).ToString();
                        firstMemberTribe = getFirstMemberAfterDeleteDR.GetValue(9).ToString();
                        firstMemberSex = getFirstMemberAfterDeleteDR.GetValue(10).ToString();
                        firstMemberBirthDate = getFirstMemberAfterDeleteDR.GetValue(11).ToString();
                        firstMemberAge = getFirstMemberAfterDeleteDR.GetValue(12).ToString();
                        firstMemberReligion = getFirstMemberAfterDeleteDR.GetValue(13).ToString();
                        firstMemberEducation = getFirstMemberAfterDeleteDR.GetValue(14).ToString();
                        firstMemberOccupation = getFirstMemberAfterDeleteDR.GetValue(15).ToString();
                        firstMemberRelationship = getFirstMemberAfterDeleteDR.GetValue(16).ToString();
                        firstMemberPWD = getFirstMemberAfterDeleteDR.GetValue(17).ToString();
                        firstMemberIP = getFirstMemberAfterDeleteDR.GetValue(18).ToString();
                        firstMemberPhilhealth = getFirstMemberAfterDeleteDR.GetValue(19).ToString();
                        firstMemberBreastFeeding = getFirstMemberAfterDeleteDR.GetValue(20).ToString();
                        firstMemberNTP = getFirstMemberAfterDeleteDR.GetValue(21).ToString();
                        firstMemberSmooking = getFirstMemberAfterDeleteDR.GetValue(22).ToString();
                        firstMemberFourps = getFirstMemberAfterDeleteDR.GetValue(23).ToString();
                    }
                    getFirstMemberAfterDeleteDR.Close();
                    getFirstMemberAfterDeleteConnection.Close();

                    memberFirstNameRequired.Visibility = Visibility.Hidden;
                    memberMiddleNameRequired.Visibility = Visibility.Hidden;
                    memberLastNameRequired.Visibility = Visibility.Hidden;

                    edit_data_member_information_btn.Visibility = Visibility.Visible;
                    update_data_member_information_btn.Visibility = Visibility.Hidden;
                    cancel_member_information_btn.Visibility = Visibility.Hidden;

                    new_Member_btn.Visibility = Visibility.Visible;
                    add_Member_btn.Visibility = Visibility.Hidden;
                    cancel_new_member_information_btn.Visibility = Visibility.Hidden;

                    deleteColumn.Visibility = Visibility.Hidden;

                    member_first_name_textbox.Text = firstMemberFirstName;
                    member_middle_name_textbox.Text = firstMemberMiddleName;
                    member_last_name_textbox.Text = firstMemberLastName;
                    member_suffix_textbox.Text = firstMemberSuffix;
                    member_dependency_textbox.Text = firstMemberDependency;
                    member_tribe_textbox.Text = firstMemberTribe;
                    member_sex_textbox.Text = firstMemberSex;
                    member_bdate_textbox.Text = firstMemberBirthDate;
                    member_religion_textbox.Text = firstMemberReligion;
                    member_education_textbox.Text = firstMemberEducation;
                    member_age_textbox.Text = firstMemberAge;
                    member_occupation_textbox.Text = firstMemberOccupation;
                    member_relationship_textbox.Text = firstMemberRelationship;
                    member_pwd_textbox.Text = firstMemberPWD;
                    member_ip_textbox.Text = firstMemberIP;
                    member_philhealth_textbox.Text = firstMemberPhilhealth;
                    member_breast_feeding_textbox.Text = firstMemberBreastFeeding;
                    member_ntp_textbox.Text = firstMemberNTP;
                    member_smooking_textbox.Text = firstMemberSmooking;
                    member_fourps_textbox.Text = firstMemberFourps;

                    member_first_name_textbox.Visibility = Visibility.Visible;
                    member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_first_name_textbox.BorderThickness = new Thickness(1);
                    member_first_name_textbox.IsReadOnly = true;

                    member_middle_name_textbox.Visibility = Visibility.Visible;
                    member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_middle_name_textbox.BorderThickness = new Thickness(1);
                    member_middle_name_textbox.IsReadOnly = true;

                    member_last_name_textbox.Visibility = Visibility.Visible;
                    member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_last_name_textbox.BorderThickness = new Thickness(1);
                    member_last_name_textbox.IsReadOnly = true;

                    head_suffix_border.Visibility = Visibility.Visible;
                    head_suffix_border.BorderBrush = Brushes.DarkGray;
                    head_suffix_border.BorderThickness = new Thickness(1);
                    head_suffix_Textbox.IsEnabled = false;

                    member_dependency_border.Visibility = Visibility.Visible;
                    member_dependency_border.BorderBrush = Brushes.DarkGray;
                    member_dependency_border.BorderThickness = new Thickness(1);
                    member_dependency_textbox.IsEnabled = false;

                    member_tribe_border.Visibility = Visibility.Visible;
                    member_tribe_border.BorderBrush = Brushes.DarkGray;
                    member_tribe_border.BorderThickness = new Thickness(1);
                    member_tribe_textbox.IsEnabled = false;

                    member_sex_border.Visibility = Visibility.Visible;
                    member_sex_border.BorderBrush = Brushes.DarkGray;
                    member_sex_border.BorderThickness = new Thickness(1);
                    member_sex_textbox.IsEnabled = false;

                    member_bdate_textbox.Visibility = Visibility.Visible;
                    member_bdate_textbox.BorderBrush = Brushes.DarkGray;
                    member_bdate_textbox.BorderThickness = new Thickness(1);
                    member_bdate_textbox.IsEnabled = false;

                    member_religion_border.Visibility = Visibility.Visible;
                    member_religion_border.BorderBrush = Brushes.DarkGray;
                    member_religion_border.BorderThickness = new Thickness(1);
                    member_religion_textbox.IsEnabled = false;

                    member_education_border.Visibility = Visibility.Visible;
                    member_education_border.BorderBrush = Brushes.DarkGray;
                    member_education_border.BorderThickness = new Thickness(1);
                    member_education_textbox.IsEnabled = false;

                    member_age_textbox.Visibility = Visibility.Visible;
                    member_age_textbox.BorderBrush = Brushes.DarkGray;
                    member_age_textbox.BorderThickness = new Thickness(1);
                    member_age_textbox.IsReadOnly = true;

                    member_occupation_textbox.Visibility = Visibility.Visible;
                    member_occupation_textbox.BorderBrush = Brushes.DarkGray;
                    member_occupation_textbox.BorderThickness = new Thickness(1);
                    member_occupation_textbox.IsReadOnly = true;

                    member_relationship_border.Visibility = Visibility.Visible;
                    member_relationship_border.BorderBrush = Brushes.DarkGray;
                    member_relationship_border.BorderThickness = new Thickness(1);
                    member_relationship_textbox.IsEnabled = false;

                    member_pwd_border.Visibility = Visibility.Visible;
                    member_pwd_border.BorderBrush = Brushes.DarkGray;
                    member_pwd_border.BorderThickness = new Thickness(1);
                    member_pwd_textbox.IsEnabled = false;

                    member_ip_border.Visibility = Visibility.Visible;
                    member_ip_border.BorderBrush = Brushes.DarkGray;
                    member_ip_border.BorderThickness = new Thickness(1);
                    member_ip_textbox.IsEnabled = false;

                    member_philhealth_border.Visibility = Visibility.Visible;
                    member_philhealth_border.BorderBrush = Brushes.DarkGray;
                    member_philhealth_border.BorderThickness = new Thickness(1);
                    member_philhealth_textbox.IsEnabled = false;

                    member_breast_feeding_border.Visibility = Visibility.Visible;
                    member_breast_feeding_border.BorderBrush = Brushes.DarkGray;
                    member_breast_feeding_border.BorderThickness = new Thickness(1);
                    member_breast_feeding_textbox.IsEnabled = false;

                    member_ntp_border.Visibility = Visibility.Visible;
                    member_ntp_border.BorderBrush = Brushes.DarkGray;
                    member_ntp_border.BorderThickness = new Thickness(1);
                    member_ntp_textbox.IsEnabled = false;

                    member_smooking_border.Visibility = Visibility.Visible;
                    member_smooking_border.BorderBrush = Brushes.DarkGray;
                    member_smooking_border.BorderThickness = new Thickness(1);
                    member_smooking_textbox.IsEnabled = false;

                    member_fourps_border.Visibility = Visibility.Visible;
                    member_fourps_border.BorderBrush = Brushes.DarkGray;
                    member_fourps_border.BorderThickness = new Thickness(1);
                    member_fourps_textbox.IsEnabled = false;

                    newMemberImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                    new_Member_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                    new_Member_btn.IsEnabled = false;
                    new_Member_btn.BorderThickness = new Thickness(1);
                    new_Member_btn.BorderBrush = Brushes.Black;
                    new_Member_btn.Cursor = Cursors.Arrow;

                    connection.Open();
                    string getFamilyMembersCount = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                    SqlCommand getFamilyMembersCountCMD = new SqlCommand(getFamilyMembersCount, connection);
                    getFamilyMembersCountCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    getFamilyMembersCountCMD.ExecuteNonQuery();
                    SqlDataAdapter getFamilyMembersCountDA = new SqlDataAdapter(getFamilyMembersCountCMD);
                    DataTable getFamilyMembersCountDT = new DataTable("familyMembers");
                    getFamilyMembersCountDA.Fill(getFamilyMembersCountDT);
                    member_dataGrid.ItemsSource = getFamilyMembersCountDT.DefaultView;
                    getFamilyMembersCountDA.Update(getFamilyMembersCountDT);
                    connection.Close();

                    if (member_dataGrid.Items.Count == 0)
                    {
                        empty_member_dataGrid.Visibility = Visibility.Visible;
                        member_dataGrid.Visibility = Visibility.Hidden;
                    }

                    //getting famnum Value
                    SqlConnection getHouseholdFamnumConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    getHouseholdFamnumConnection.Open();
                    SqlCommand getHouseholdFamnumCMD = new SqlCommand();
                    getHouseholdFamnumCMD.Connection = getHouseholdFamnumConnection;
                    getHouseholdFamnumCMD.CommandText = "SELECT family_number FROM household WHERE household_id = @householdID";
                    getHouseholdFamnumCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    getHouseholdFamnumCMD.ExecuteNonQuery();

                    SqlDataReader getHouseholdFamnumDR = getHouseholdFamnumCMD.ExecuteReader();
                    while (getHouseholdFamnumDR.Read())
                    {
                        famnumValue = getHouseholdFamnumDR.GetValue(0).ToString();
                    }
                    getHouseholdFamnumDR.Close();
                    getHouseholdFamnumConnection.Close();

                    famnumValueInteger = Int32.Parse(famnumValue);

                    famnumValueInteger = famnumValueInteger - 1;

                    //Updating famnum
                    connection.Open();
                    SqlCommand updateFamnumCMD = new SqlCommand();
                    updateFamnumCMD.Connection = connection;
                    updateFamnumCMD.CommandText = "UPDATE household SET family_number=@newFamnum WHERE household_id = @householdID";
                    updateFamnumCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    updateFamnumCMD.Parameters.AddWithValue("@newFamnum", famnumValueInteger);
                    SqlDataAdapter updateFamnumDA = new SqlDataAdapter(updateFamnumCMD);
                    DataTable updateFamnumDT = new DataTable();
                    updateFamnumDA.Fill(updateFamnumDT);
                    connection.Close();
                    break;

                case MessageBoxResult.No:
                    break;
            }
        }

        private void member_view_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedViewRow = member_dataGrid.SelectedItem as DataRowView;
            string selectedViewRow_id = getSelectedViewRow.Row[0].ToString();
            SelectedViewMember = selectedViewRow_id;

            SqlConnection getMemberInformationConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getMemberInformationConnection.Open();
            SqlCommand getMemberInformationCMD = new SqlCommand();
            getMemberInformationCMD.Connection = getMemberInformationConnection;
            getMemberInformationCMD.CommandText = "SELECT * FROM familyMembers WHERE family_member_id = @viewMemberID";
            getMemberInformationCMD.Parameters.AddWithValue("@viewMemberID", selectedViewRow_id);
            getMemberInformationCMD.ExecuteNonQuery();

            SqlDataReader getMemberInformationDR = getMemberInformationCMD.ExecuteReader();
            while (getMemberInformationDR.Read())
            {
                viewMemberFirstName = getMemberInformationDR.GetValue(3).ToString();
                viewMemberMiddleName = getMemberInformationDR.GetValue(4).ToString();
                viewMemberLastName = getMemberInformationDR.GetValue(5).ToString();
                viewMemberSuffix = getMemberInformationDR.GetValue(6).ToString();
                viewMemberDependency = getMemberInformationDR.GetValue(8).ToString();
                viewMemberTribe = getMemberInformationDR.GetValue(9).ToString();
                viewMemberSex = getMemberInformationDR.GetValue(10).ToString();
                viewMemberBirthDate = getMemberInformationDR.GetValue(11).ToString();
                viewMemberAge = getMemberInformationDR.GetValue(12).ToString();
                viewMemberReligion = getMemberInformationDR.GetValue(13).ToString();
                viewMemberEducation = getMemberInformationDR.GetValue(14).ToString();
                viewMemberOccupation = getMemberInformationDR.GetValue(15).ToString();
                viewMemberRelationship = getMemberInformationDR.GetValue(16).ToString();
                viewMemberPWD = getMemberInformationDR.GetValue(17).ToString();
                viewMemberIP = getMemberInformationDR.GetValue(18).ToString();
                viewMemberPhilhealth = getMemberInformationDR.GetValue(19).ToString();
                viewMemberBreastFeeding = getMemberInformationDR.GetValue(20).ToString();
                viewMemberNTP = getMemberInformationDR.GetValue(21).ToString();
                viewMemberSmooking = getMemberInformationDR.GetValue(22).ToString();
                viewMemberFourps = getMemberInformationDR.GetValue(23).ToString();
            }
            getMemberInformationDR.Close();
            getMemberInformationConnection.Close();


            member_first_name_textbox.Text = viewMemberFirstName;
            member_middle_name_textbox.Text = viewMemberMiddleName;
            member_last_name_textbox.Text = viewMemberLastName;
            member_suffix_textbox.Text = viewMemberSuffix;
            member_dependency_textbox.Text = viewMemberDependency;
            member_tribe_textbox.Text = viewMemberTribe;
            member_sex_textbox.Text = viewMemberSex;
            member_bdate_textbox.Text = viewMemberBirthDate;
            member_religion_textbox.Text = viewMemberReligion;
            member_education_textbox.Text = viewMemberEducation;
            member_age_textbox.Text = viewMemberAge;
            member_occupation_textbox.Text = viewMemberOccupation;
            member_relationship_textbox.Text = viewMemberRelationship;
            member_pwd_textbox.Text = viewMemberPWD;
            member_ip_textbox.Text = viewMemberIP;
            member_philhealth_textbox.Text = viewMemberPhilhealth;
            member_breast_feeding_textbox.Text = viewMemberBreastFeeding;
            member_ntp_textbox.Text = viewMemberNTP;
            member_smooking_textbox.Text = viewMemberSmooking;
            member_fourps_textbox.Text = viewMemberFourps;

            viewClick = 1;
        }

        private void new_Member_btn_Click(object sender, RoutedEventArgs e)
        {
            new_Member_btn.Visibility = Visibility.Hidden;
            add_Member_btn.Visibility = Visibility.Visible;
            cancel_new_member_information_btn.Visibility = Visibility.Visible;

            deleteColumn.Visibility = Visibility.Collapsed;
            viewColumn.Visibility = Visibility.Hidden;
            disabledDeleteColumn.Visibility = Visibility.Visible;
            disabledViewColumn.Visibility = Visibility.Visible;

            updateImageMemberInformation.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
            update_data_member_information_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
            update_data_member_information_btn.IsEnabled = false;
            update_data_member_information_btn.BorderThickness = new Thickness(1);
            update_data_member_information_btn.BorderBrush = Brushes.Black;
            update_data_member_information_btn.Cursor = Cursors.Arrow;
            updateMemberInformationTextBlock.Foreground = Brushes.DarkGray;

            member_first_name_textbox.Text = "";
            member_middle_name_textbox.Text = "";
            member_last_name_textbox.Text = "";
            member_suffix_textbox.Text = "";
            member_dependency_textbox.Text = "";
            member_tribe_textbox.Text = "";
            member_sex_textbox.Text = "";
            member_bdate_textbox.Text = "";
            member_religion_textbox.Text = "";
            member_education_textbox.Text = "";
            member_age_textbox.Text = "";
            member_occupation_textbox.Text = "";
            member_relationship_textbox.Text = "";
            member_pwd_textbox.Text = "";
            member_ip_textbox.Text = "";
            member_philhealth_textbox.Text = "";
            member_breast_feeding_textbox.Text = "";
            member_ntp_textbox.Text = "";
            member_smooking_textbox.Text = "";
            member_fourps_textbox.Text = "";

            member_first_name_textbox.Visibility = Visibility.Visible;
            member_first_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_first_name_textbox.BorderThickness = new Thickness(2);

            member_middle_name_textbox.Visibility = Visibility.Visible;
            member_middle_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_middle_name_textbox.BorderThickness = new Thickness(2);

            member_last_name_textbox.Visibility = Visibility.Visible;
            member_last_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_last_name_textbox.BorderThickness = new Thickness(2);
        }

        private void Cancel_new_member_information_btn_Click(object sender, RoutedEventArgs e)
        {
            new_Member_btn.Visibility = Visibility.Visible;
            add_Member_btn.Visibility = Visibility.Hidden;
            cancel_new_member_information_btn.Visibility = Visibility.Hidden;

            deleteColumn.Visibility = Visibility.Visible;
            viewColumn.Visibility = Visibility.Visible;
            disabledDeleteColumn.Visibility = Visibility.Hidden;
            disabledViewColumn.Visibility = Visibility.Hidden;

            member_first_name_textbox.Visibility = Visibility.Visible;
            member_first_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_first_name_textbox.BorderThickness = new Thickness(2);

            member_middle_name_textbox.Visibility = Visibility.Visible;
            member_middle_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_middle_name_textbox.BorderThickness = new Thickness(2);

            member_last_name_textbox.Visibility = Visibility.Visible;
            member_last_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            member_last_name_textbox.BorderThickness = new Thickness(2);

            updateImageMemberInformation.Source = new BitmapImage(new Uri(@"img/Update Icon.png", UriKind.Relative));
            update_data_member_information_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            update_data_member_information_btn.IsEnabled = true;
            update_data_member_information_btn.BorderThickness = new Thickness(1);
            update_data_member_information_btn.BorderBrush = Brushes.DarkGray;
            update_data_member_information_btn.Cursor = Cursors.Hand;
            updateMemberInformationTextBlock.Foreground = Brushes.White;

            member_first_name_textbox.Text = firstMemberFirstName;
            member_middle_name_textbox.Text = firstMemberMiddleName;
            member_last_name_textbox.Text = firstMemberLastName;
            member_suffix_textbox.Text = firstMemberSuffix;
            member_dependency_textbox.Text = firstMemberDependency;
            member_tribe_textbox.Text = firstMemberTribe;
            member_sex_textbox.Text = firstMemberSex;
            member_bdate_textbox.Text = firstMemberBirthDate;
            member_religion_textbox.Text = firstMemberReligion;
            member_education_textbox.Text = firstMemberEducation;
            member_age_textbox.Text = firstMemberAge;
            member_occupation_textbox.Text = firstMemberOccupation;
            member_relationship_textbox.Text = firstMemberRelationship;
            member_pwd_textbox.Text = firstMemberPWD;
            member_ip_textbox.Text = firstMemberIP;
            member_philhealth_textbox.Text = firstMemberPhilhealth;
            member_breast_feeding_textbox.Text = firstMemberBreastFeeding;
            member_ntp_textbox.Text = firstMemberNTP;
            member_smooking_textbox.Text = firstMemberSmooking;
            member_fourps_textbox.Text = firstMemberFourps;
        }

        private void add_Member_btn_Click(object sender, RoutedEventArgs e)
        {

            //checking empty member input box
            if (String.IsNullOrEmpty(member_first_name_textbox.Text) || String.IsNullOrEmpty(member_middle_name_textbox.Text) || String.IsNullOrEmpty(member_last_name_textbox.Text))
            {
                MessageBox.Show(this, "Name field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                //member first name
                if (member_first_name_textbox.Text == "")
                {
                    member_first_name_textbox.BorderBrush = Brushes.Red;

                    member_first_name_textbox.Focus();

                    if (member_middle_name_textbox.Text == "")
                    {
                        member_middle_name_textbox.BorderBrush = Brushes.Red;
                    }

                    if (member_last_name_textbox.Text == "")
                    {
                        member_last_name_textbox.BorderBrush = Brushes.Red;
                    }

                    if (member_middle_name_textbox.Text != "")
                    {
                        member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                    }

                    if (member_last_name_textbox.Text != "")
                    {
                        member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                    }
                }
                //

                //member middle name
                else if (member_middle_name_textbox.Text == "")
                {
                    member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_middle_name_textbox.BorderBrush = Brushes.Red;

                    member_middle_name_textbox.Focus();

                    if (member_last_name_textbox.Text == "")
                    {
                        member_last_name_textbox.BorderBrush = Brushes.Red;
                    }

                    else
                    {
                        member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                    }
                }
                //

                //member last name
                else if (member_last_name_textbox.Text == "")
                {
                    member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                    member_last_name_textbox.BorderBrush = Brushes.Red;

                    member_last_name_textbox.Focus();
                }
                //
            }
            //end checking

            else
            {
                member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                member_last_name_textbox.BorderBrush = Brushes.DarkGray;

                MessageBoxResult addMemberResult = MessageBox.Show("Do you want to add this Member of this household?", "Confirmation", MessageBoxButton.YesNo);

                switch (addMemberResult)
                {
                    case MessageBoxResult.Yes:


                        connection.Open();
                        SqlCommand addMemberCMD = new SqlCommand();
                        addMemberCMD.Connection = connection;
                        addMemberCMD.CommandText = "INSERT INTO familyMembers(family_member_household_id, full_name, first_name, middle_name, last_name, suffix, head_or_member, dependency, tribe, sex, bdate, age, religion, education, occupation, relationship, pwd, ip, philhealth, breast_feeding, ntp, smooking, fourps) VALUES(@householdID, @first_name + ' ' + @middle_name + ' ' + @last_name + ' ' + @suffix, @first_name, @middle_name, @last_name, @suffix, 'Member', @dependency, @tribe, @sex, @bdate, @age, @religion, @education, @occupation, @relationship, @pwd, @ip, @philhealth, @breast_feeding, @ntp, @smooking, @fourps)";
                        addMemberCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                        addMemberCMD.Parameters.AddWithValue("@first_name", member_first_name_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@middle_name", member_middle_name_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@last_name", member_last_name_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@suffix", member_suffix_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@dependency", member_dependency_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@tribe", member_tribe_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@sex", member_sex_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@bdate", member_bdate_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@age", member_age_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@religion", member_religion_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@education", member_education_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@occupation", member_occupation_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@relationship", member_relationship_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@pwd", member_pwd_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@ip", member_ip_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@philhealth", member_philhealth_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@breast_feeding", member_breast_feeding_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@ntp", member_ntp_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@smooking", member_smooking_textbox.Text);
                        addMemberCMD.Parameters.AddWithValue("@fourps", member_fourps_textbox.Text);
                        SqlDataAdapter addMemberDA = new SqlDataAdapter(addMemberCMD);
                        DataTable addMemberDT = new DataTable();
                        addMemberDA.Fill(addMemberDT);
                        connection.Close();

                        MessageBox.Show("Family Member had been Successfully Added to household");

                        connection.Open();
                        string getFamilyMembers = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                        SqlCommand getFamilyMembersCMD = new SqlCommand(getFamilyMembers, connection);
                        getFamilyMembersCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                        getFamilyMembersCMD.ExecuteNonQuery();
                        SqlDataAdapter getFamilyMembersDA = new SqlDataAdapter(getFamilyMembersCMD);
                        DataTable getFamilyMembersDT = new DataTable("familyMembers");
                        getFamilyMembersDA.Fill(getFamilyMembersDT);
                        member_dataGrid.ItemsSource = getFamilyMembersDT.DefaultView;
                        getFamilyMembersDA.Update(getFamilyMembersDT);
                        connection.Close();

                        memberFirstNameRequired.Visibility = Visibility.Hidden;
                        memberMiddleNameRequired.Visibility = Visibility.Hidden;
                        memberLastNameRequired.Visibility = Visibility.Hidden;

                        new_Member_btn.Visibility = Visibility.Visible;
                        add_Member_btn.Visibility = Visibility.Hidden;
                        cancel_new_member_information_btn.Visibility = Visibility.Hidden;

                        disabledDeleteColumn.Visibility = Visibility.Hidden;
                        disabledViewColumn.Visibility = Visibility.Hidden;

                        viewColumn.Visibility = Visibility.Visible;

                        //getting first family member
                        SqlConnection getFirstMemberAfterAddConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                        getFirstMemberAfterAddConnection.Open();
                        SqlCommand getFirstMemberAfterAddCMD = new SqlCommand();
                        getFirstMemberAfterAddCMD.Connection = getFirstMemberAfterAddConnection;
                        getFirstMemberAfterAddCMD.CommandText = "SELECT TOP 1 * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_member_household_id=@householdID AND head_or_member='Member' ORDER BY full_name";
                        getFirstMemberAfterAddCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                        getFirstMemberAfterAddCMD.ExecuteNonQuery();

                        SqlDataReader getFirstMemberAfterAddDR = getFirstMemberAfterAddCMD.ExecuteReader();
                        while (getFirstMemberAfterAddDR.Read())
                        {
                            firstMemberFirstName = getFirstMemberAfterAddDR.GetValue(3).ToString();
                            firstMemberMiddleName = getFirstMemberAfterAddDR.GetValue(4).ToString();
                            firstMemberLastName = getFirstMemberAfterAddDR.GetValue(5).ToString();
                            firstMemberSuffix = getFirstMemberAfterAddDR.GetValue(6).ToString();
                            firstMemberDependency = getFirstMemberAfterAddDR.GetValue(8).ToString();
                            firstMemberTribe = getFirstMemberAfterAddDR.GetValue(9).ToString();
                            firstMemberSex = getFirstMemberAfterAddDR.GetValue(10).ToString();
                            firstMemberBirthDate = getFirstMemberAfterAddDR.GetValue(11).ToString();
                            firstMemberAge = getFirstMemberAfterAddDR.GetValue(12).ToString();
                            firstMemberReligion = getFirstMemberAfterAddDR.GetValue(13).ToString();
                            firstMemberEducation = getFirstMemberAfterAddDR.GetValue(14).ToString();
                            firstMemberOccupation = getFirstMemberAfterAddDR.GetValue(15).ToString();
                            firstMemberRelationship = getFirstMemberAfterAddDR.GetValue(16).ToString();
                            firstMemberPWD = getFirstMemberAfterAddDR.GetValue(17).ToString();
                            firstMemberIP = getFirstMemberAfterAddDR.GetValue(18).ToString();
                            firstMemberPhilhealth = getFirstMemberAfterAddDR.GetValue(19).ToString();
                            firstMemberBreastFeeding = getFirstMemberAfterAddDR.GetValue(20).ToString();
                            firstMemberNTP = getFirstMemberAfterAddDR.GetValue(21).ToString();
                            firstMemberSmooking = getFirstMemberAfterAddDR.GetValue(22).ToString();
                            firstMemberFourps = getFirstMemberAfterAddDR.GetValue(23).ToString();
                        }
                        getFirstMemberAfterAddDR.Close();
                        getFirstMemberAfterAddConnection.Close();

                        member_first_name_textbox.Text = firstMemberFirstName;
                        member_middle_name_textbox.Text = firstMemberMiddleName;
                        member_last_name_textbox.Text = firstMemberLastName;
                        member_suffix_textbox.Text = firstMemberSuffix;
                        member_dependency_textbox.Text = firstMemberDependency;
                        member_tribe_textbox.Text = firstMemberTribe;
                        member_sex_textbox.Text = firstMemberSex;
                        member_bdate_textbox.Text = firstMemberBirthDate;
                        member_religion_textbox.Text = firstMemberReligion;
                        member_education_textbox.Text = firstMemberEducation;
                        member_age_textbox.Text = firstMemberAge;
                        member_occupation_textbox.Text = firstMemberOccupation;
                        member_relationship_textbox.Text = firstMemberRelationship;
                        member_pwd_textbox.Text = firstMemberPWD;
                        member_ip_textbox.Text = firstMemberIP;
                        member_philhealth_textbox.Text = firstMemberPhilhealth;
                        member_breast_feeding_textbox.Text = firstMemberBreastFeeding;
                        member_ntp_textbox.Text = firstMemberNTP;
                        member_smooking_textbox.Text = firstMemberSmooking;
                        member_fourps_textbox.Text = firstMemberFourps;

                        member_first_name_textbox.Visibility = Visibility.Visible;
                        member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                        member_first_name_textbox.BorderThickness = new Thickness(1);
                        member_first_name_textbox.IsReadOnly = true;

                        member_middle_name_textbox.Visibility = Visibility.Visible;
                        member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                        member_middle_name_textbox.BorderThickness = new Thickness(1);
                        member_middle_name_textbox.IsReadOnly = true;

                        member_last_name_textbox.Visibility = Visibility.Visible;
                        member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                        member_last_name_textbox.BorderThickness = new Thickness(1);
                        member_last_name_textbox.IsReadOnly = true;

                        head_suffix_border.Visibility = Visibility.Visible;
                        head_suffix_border.BorderBrush = Brushes.DarkGray;
                        head_suffix_border.BorderThickness = new Thickness(1);
                        head_suffix_Textbox.IsEnabled = false;

                        member_dependency_border.Visibility = Visibility.Visible;
                        member_dependency_border.BorderBrush = Brushes.DarkGray;
                        member_dependency_border.BorderThickness = new Thickness(1);
                        member_dependency_textbox.IsEnabled = false;

                        member_tribe_border.Visibility = Visibility.Visible;
                        member_tribe_border.BorderBrush = Brushes.DarkGray;
                        member_tribe_border.BorderThickness = new Thickness(1);
                        member_tribe_textbox.IsEnabled = false;

                        member_sex_border.Visibility = Visibility.Visible;
                        member_sex_border.BorderBrush = Brushes.DarkGray;
                        member_sex_border.BorderThickness = new Thickness(1);
                        member_sex_textbox.IsEnabled = false;

                        member_bdate_textbox.Visibility = Visibility.Visible;
                        member_bdate_textbox.BorderBrush = Brushes.DarkGray;
                        member_bdate_textbox.BorderThickness = new Thickness(1);
                        member_bdate_textbox.IsEnabled = false;

                        member_religion_border.Visibility = Visibility.Visible;
                        member_religion_border.BorderBrush = Brushes.DarkGray;
                        member_religion_border.BorderThickness = new Thickness(1);
                        member_religion_textbox.IsEnabled = false;

                        member_education_border.Visibility = Visibility.Visible;
                        member_education_border.BorderBrush = Brushes.DarkGray;
                        member_education_border.BorderThickness = new Thickness(1);
                        member_education_textbox.IsEnabled = false;

                        member_age_textbox.Visibility = Visibility.Visible;
                        member_age_textbox.BorderBrush = Brushes.DarkGray;
                        member_age_textbox.BorderThickness = new Thickness(1);
                        member_age_textbox.IsReadOnly = true;

                        member_occupation_textbox.Visibility = Visibility.Visible;
                        member_occupation_textbox.BorderBrush = Brushes.DarkGray;
                        member_occupation_textbox.BorderThickness = new Thickness(1);
                        member_occupation_textbox.IsReadOnly = true;

                        member_relationship_border.Visibility = Visibility.Visible;
                        member_relationship_border.BorderBrush = Brushes.DarkGray;
                        member_relationship_border.BorderThickness = new Thickness(1);
                        member_relationship_textbox.IsEnabled = false;

                        member_pwd_border.Visibility = Visibility.Visible;
                        member_pwd_border.BorderBrush = Brushes.DarkGray;
                        member_pwd_border.BorderThickness = new Thickness(1);
                        member_pwd_textbox.IsEnabled = false;

                        member_ip_border.Visibility = Visibility.Visible;
                        member_ip_border.BorderBrush = Brushes.DarkGray;
                        member_ip_border.BorderThickness = new Thickness(1);
                        member_ip_textbox.IsEnabled = false;

                        member_philhealth_border.Visibility = Visibility.Visible;
                        member_philhealth_border.BorderBrush = Brushes.DarkGray;
                        member_philhealth_border.BorderThickness = new Thickness(1);
                        member_philhealth_textbox.IsEnabled = false;

                        member_breast_feeding_border.Visibility = Visibility.Visible;
                        member_breast_feeding_border.BorderBrush = Brushes.DarkGray;
                        member_breast_feeding_border.BorderThickness = new Thickness(1);
                        member_breast_feeding_textbox.IsEnabled = false;

                        member_ntp_border.Visibility = Visibility.Visible;
                        member_ntp_border.BorderBrush = Brushes.DarkGray;
                        member_ntp_border.BorderThickness = new Thickness(1);
                        member_ntp_textbox.IsEnabled = false;

                        member_smooking_border.Visibility = Visibility.Visible;
                        member_smooking_border.BorderBrush = Brushes.DarkGray;
                        member_smooking_border.BorderThickness = new Thickness(1);
                        member_smooking_textbox.IsEnabled = false;

                        member_fourps_border.Visibility = Visibility.Visible;
                        member_fourps_border.BorderBrush = Brushes.DarkGray;
                        member_fourps_border.BorderThickness = new Thickness(1);
                        member_fourps_textbox.IsEnabled = false;

                        edit_data_member_information_btn.Visibility = Visibility.Visible;
                        update_data_member_information_btn.Visibility = Visibility.Hidden;
                        cancel_member_information_btn.Visibility = Visibility.Hidden;

                        newMemberImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                        new_Member_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                        new_Member_btn.IsEnabled = false;
                        new_Member_btn.BorderThickness = new Thickness(1);
                        new_Member_btn.BorderBrush = Brushes.Black;
                        new_Member_btn.Cursor = Cursors.Arrow;

                        //getting famnum Value
                        SqlConnection getHouseholdFamnumConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                        getHouseholdFamnumConnection.Open();
                        SqlCommand getHouseholdFamnumCMD = new SqlCommand();
                        getHouseholdFamnumCMD.Connection = getHouseholdFamnumConnection;
                        getHouseholdFamnumCMD.CommandText = "SELECT family_number FROM household WHERE household_id = @householdID";
                        getHouseholdFamnumCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                        getHouseholdFamnumCMD.ExecuteNonQuery();

                        SqlDataReader getHouseholdFamnumDR = getHouseholdFamnumCMD.ExecuteReader();
                        while (getHouseholdFamnumDR.Read())
                        {
                            famnumValue = getHouseholdFamnumDR.GetValue(0).ToString();
                        }
                        getHouseholdFamnumDR.Close();
                        getHouseholdFamnumConnection.Close();

                        famnumValueInteger = Int32.Parse(famnumValue);

                        famnumValueInteger = famnumValueInteger + 1;

                        //Updating famnum
                        connection.Open();
                        SqlCommand updateFamnumCMD = new SqlCommand();
                        updateFamnumCMD.Connection = connection;
                        updateFamnumCMD.CommandText = "UPDATE household SET family_number=@newFamnum WHERE household_id = @householdID";
                        updateFamnumCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                        updateFamnumCMD.Parameters.AddWithValue("@newFamnum", famnumValueInteger);
                        SqlDataAdapter updateFamnumDA = new SqlDataAdapter(updateFamnumCMD);
                        DataTable updateFamnumDT = new DataTable();
                        updateFamnumDA.Fill(updateFamnumDT);
                        connection.Close();
                        break;

                    case MessageBoxResult.No:
                        break;
                }
            }
        }

        private void Edit_data_background_information_btn_Click(object sender, RoutedEventArgs e)
        {
            update_data_background_information_btn.Visibility = Visibility.Visible;
            cancel_background_information_btn.Visibility = Visibility.Visible;
            edit_data_background_information_btn.Visibility = Visibility.Hidden;

            household_mother_tongue_border.Visibility = Visibility.Visible;
            household_mother_tongue_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_mother_tongue_border.BorderThickness = new Thickness(2);
            household_mother_tongue_textbox.IsEnabled = true;

            household_house_type_border.Visibility = Visibility.Visible;
            household_house_type_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_house_type_border.BorderThickness = new Thickness(2);
            household_house_type_textbox.IsEnabled = true;

            household_sanitary_toilet_border.Visibility = Visibility.Visible;
            household_sanitary_toilet_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_sanitary_toilet_border.BorderThickness = new Thickness(2);
            household_sanitary_toilet_textbox.IsEnabled = true;

            household_immunization_border.Visibility = Visibility.Visible;
            household_immunization_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_immunization_border.BorderThickness = new Thickness(2);
            household_immunization_textbox.IsEnabled = true;

            household_wra_border.Visibility = Visibility.Visible;
            household_wra_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_wra_border.BorderThickness = new Thickness(2);
            household_wra_textbox.IsEnabled = true;

            household_garbage_disposal_border.Visibility = Visibility.Visible;
            household_garbage_disposal_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_garbage_disposal_border.BorderThickness = new Thickness(2);
            household_garbage_disposal_textbox.IsEnabled = true;

            household_water_source_border.Visibility = Visibility.Visible;
            household_water_source_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_water_source_border.BorderThickness = new Thickness(2);
            household_water_source_textbox.IsEnabled = true;

            household_family_planning_border.Visibility = Visibility.Visible;
            household_family_planning_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_family_planning_border.BorderThickness = new Thickness(2);
            household_family_planning_textbox.IsEnabled = true;

            household_background_gardening_border.Visibility = Visibility.Visible;
            household_background_gardening_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_background_gardening_border.BorderThickness = new Thickness(2);
            household_background_gardening_textbox.IsEnabled = true;

            household_livelihood_status_textbox.Visibility = Visibility.Visible;
            household_livelihood_status_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_livelihood_status_textbox.BorderThickness = new Thickness(2);
            household_livelihood_status_textbox.IsReadOnly = false;

            household_animals_border.Visibility = Visibility.Visible;
            household_animals_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_animals_border.BorderThickness = new Thickness(2);
            household_animals_textbox.IsEnabled = true;

            household_blind_drainage_border.Visibility = Visibility.Visible;
            household_blind_drainage_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_blind_drainage_border.BorderThickness = new Thickness(2);
            household_blind_drainage_textbox.IsEnabled = true;

            household_communication_textbox.Visibility = Visibility.Visible;
            household_communication_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_communication_textbox.BorderThickness = new Thickness(2);
            household_communication_textbox.IsReadOnly = false;

            household_homelot_status_border.Visibility = Visibility.Visible;
            household_homelot_status_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_homelot_status_border.BorderThickness = new Thickness(2);
            household_homelot_status_textbox.IsEnabled = true;

            household_energy_source_textbox.Visibility = Visibility.Visible;
            household_energy_source_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_energy_source_textbox.BorderThickness = new Thickness(2);
            household_energy_source_textbox.IsReadOnly = false;

            household_dwtwb_border.Visibility = Visibility.Visible;
            household_dwtwb_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_dwtwb_border.BorderThickness = new Thickness(2);
            household_dwtwb_textbox.IsEnabled = true;

            household_vulnerable_status_textbox.Visibility = Visibility.Visible;
            household_vulnerable_status_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_vulnerable_status_textbox.BorderThickness = new Thickness(2);
            household_vulnerable_status_textbox.IsReadOnly = false;

            household_agricultural_facility_border.Visibility = Visibility.Visible;
            household_agricultural_facility_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_agricultural_facility_border.BorderThickness = new Thickness(2);
            household_agricultural_facility_textbox.IsEnabled = true;

            household_other_source_of_income_textbox.Visibility = Visibility.Visible;
            household_other_source_of_income_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_other_source_of_income_textbox.BorderThickness = new Thickness(2);
            household_other_source_of_income_textbox.IsReadOnly = false;

            household_house_status_border.Visibility = Visibility.Visible;
            household_house_status_border.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_house_status_border.BorderThickness = new Thickness(2);
            household_house_status_textbox.IsEnabled = true;

            household_transportation_textbox.Visibility = Visibility.Visible;
            household_transportation_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            household_transportation_textbox.BorderThickness = new Thickness(2);
            household_transportation_textbox.IsReadOnly = false;
        }

        private void Update_data_background_information_btn_Click(object sender, RoutedEventArgs e)
        {

            MessageBoxResult addMemberResult = MessageBox.Show("Do you want to update the Background Information of this household?", "Confirmation", MessageBoxButton.YesNo);

            switch (addMemberResult)
            {
                case MessageBoxResult.Yes:
                    //Updating Background Information
                    connection.Open();
                    SqlCommand updateBackgroundInformationCMD = new SqlCommand();
                    updateBackgroundInformationCMD.Connection = connection;
                    updateBackgroundInformationCMD.CommandText = "UPDATE household SET mother_tongue=@motherTongue, house_type = @houseType, " +
                        "sanitary_toilet = @sanitaryToilet, immunization = @immunization, wra = @wra, garbage_disposal = @garbageDisposal, " +
                        "water_source = @waterSource, family_planning = @familyPlanning, background_gardening = @backgroundGardening, " +
                        "livelihood_status = @livelihoodStatus, animals = @animals, blind_drainage = @blindDrainage, " +
                        "communication = @communication, homelot_status = @homelotStatus, energy_source = @energySource, " +
                        "direct_waste_to_water_bodies = @dwtwb, vulnerable_status = @vulnerableStatus, agricultural_facilities = @agriculturalFacilities, " +
                        "other_source_of_income = @otherSourceOfIncome, house_status = @houseStatus, transportation = @transportation WHERE household_id = @householdID";
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@motherTongue", household_mother_tongue_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@houseType", household_house_type_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@sanitaryToilet", household_sanitary_toilet_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@immunization", household_immunization_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@wra", household_wra_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@garbageDisposal", household_garbage_disposal_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@waterSource", household_water_source_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@familyPlanning", household_family_planning_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@backgroundGardening", household_background_gardening_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@livelihoodStatus", household_livelihood_status_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@animals", household_animals_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@blindDrainage", household_blind_drainage_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@communication", household_communication_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@homelotStatus", household_homelot_status_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@energySource", household_energy_source_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@dwtwb", household_dwtwb_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@vulnerableStatus", household_vulnerable_status_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@agriculturalFacilities", household_agricultural_facility_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@otherSourceOfIncome", household_other_source_of_income_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@houseStatus", household_house_status_textbox.Text);
                    updateBackgroundInformationCMD.Parameters.AddWithValue("@transportation", household_transportation_textbox.Text);
                    SqlDataAdapter updateBackgroundInformationDA = new SqlDataAdapter(updateBackgroundInformationCMD);
                    DataTable updateBackgroundInformationDT = new DataTable();
                    updateBackgroundInformationDA.Fill(updateBackgroundInformationDT);
                    connection.Close();

                    MessageBox.Show("Background Information had been updated successfully!");

                    update_data_background_information_btn.Visibility = Visibility.Hidden;
                    cancel_background_information_btn.Visibility = Visibility.Hidden;
                    edit_data_background_information_btn.Visibility = Visibility.Visible;

                    household_mother_tongue_border.Visibility = Visibility.Visible;
                    household_mother_tongue_border.BorderBrush = Brushes.DarkGray;
                    household_mother_tongue_border.BorderThickness = new Thickness(1);
                    household_mother_tongue_textbox.IsEnabled = false;

                    household_house_type_border.Visibility = Visibility.Visible;
                    household_house_type_border.BorderBrush = Brushes.DarkGray;
                    household_house_type_border.BorderThickness = new Thickness(1);
                    household_house_type_textbox.IsEnabled = false;

                    household_sanitary_toilet_border.Visibility = Visibility.Visible;
                    household_sanitary_toilet_border.BorderBrush = Brushes.DarkGray;
                    household_sanitary_toilet_border.BorderThickness = new Thickness(1);
                    household_sanitary_toilet_textbox.IsEnabled = false;

                    household_immunization_border.Visibility = Visibility.Visible;
                    household_immunization_border.BorderBrush = Brushes.DarkGray;
                    household_immunization_border.BorderThickness = new Thickness(1);
                    household_immunization_textbox.IsEnabled = false;

                    household_wra_border.Visibility = Visibility.Visible;
                    household_wra_border.BorderBrush = Brushes.DarkGray;
                    household_wra_border.BorderThickness = new Thickness(1);
                    household_wra_textbox.IsEnabled = false;

                    household_garbage_disposal_border.Visibility = Visibility.Visible;
                    household_garbage_disposal_border.BorderBrush = Brushes.DarkGray;
                    household_garbage_disposal_border.BorderThickness = new Thickness(1);
                    household_garbage_disposal_textbox.IsEnabled = false;

                    household_water_source_border.Visibility = Visibility.Visible;
                    household_water_source_border.BorderBrush = Brushes.DarkGray;
                    household_water_source_border.BorderThickness = new Thickness(1);
                    household_water_source_textbox.IsEnabled = false;

                    household_family_planning_border.Visibility = Visibility.Visible;
                    household_family_planning_border.BorderBrush = Brushes.DarkGray;
                    household_family_planning_border.BorderThickness = new Thickness(1);
                    household_family_planning_textbox.IsEnabled = false;

                    household_background_gardening_border.Visibility = Visibility.Visible;
                    household_background_gardening_border.BorderBrush = Brushes.DarkGray;
                    household_background_gardening_border.BorderThickness = new Thickness(1);
                    household_background_gardening_textbox.IsEnabled = false;

                    household_livelihood_status_textbox.Visibility = Visibility.Visible;
                    household_livelihood_status_textbox.BorderBrush = Brushes.DarkGray;
                    household_livelihood_status_textbox.BorderThickness = new Thickness(1);
                    household_livelihood_status_textbox.IsReadOnly = true;

                    household_animals_border.Visibility = Visibility.Visible;
                    household_animals_border.BorderBrush = Brushes.DarkGray;
                    household_animals_border.BorderThickness = new Thickness(1);
                    household_animals_textbox.IsEnabled = false;

                    household_blind_drainage_border.Visibility = Visibility.Visible;
                    household_blind_drainage_border.BorderBrush = Brushes.DarkGray;
                    household_blind_drainage_border.BorderThickness = new Thickness(1);
                    household_blind_drainage_textbox.IsEnabled = false;

                    household_communication_textbox.Visibility = Visibility.Visible;
                    household_communication_textbox.BorderBrush = Brushes.DarkGray;
                    household_communication_textbox.BorderThickness = new Thickness(1);
                    household_communication_textbox.IsReadOnly = true;

                    household_homelot_status_border.Visibility = Visibility.Visible;
                    household_homelot_status_border.BorderBrush = Brushes.DarkGray;
                    household_homelot_status_border.BorderThickness = new Thickness(1);
                    household_homelot_status_textbox.IsEnabled = false;

                    household_energy_source_textbox.Visibility = Visibility.Visible;
                    household_energy_source_textbox.BorderBrush = Brushes.DarkGray;
                    household_energy_source_textbox.BorderThickness = new Thickness(1);
                    household_energy_source_textbox.IsReadOnly = true;

                    household_dwtwb_border.Visibility = Visibility.Visible;
                    household_dwtwb_border.BorderBrush = Brushes.DarkGray;
                    household_dwtwb_border.BorderThickness = new Thickness(1);
                    household_dwtwb_textbox.IsEnabled = false;

                    household_vulnerable_status_textbox.Visibility = Visibility.Visible;
                    household_vulnerable_status_textbox.BorderBrush = Brushes.DarkGray;
                    household_vulnerable_status_textbox.BorderThickness = new Thickness(1);
                    household_vulnerable_status_textbox.IsReadOnly = true;

                    household_agricultural_facility_border.Visibility = Visibility.Visible;
                    household_agricultural_facility_border.BorderBrush = Brushes.DarkGray;
                    household_agricultural_facility_border.BorderThickness = new Thickness(1);
                    household_agricultural_facility_textbox.IsEnabled = false;

                    household_other_source_of_income_textbox.Visibility = Visibility.Visible;
                    household_other_source_of_income_textbox.BorderBrush = Brushes.DarkGray;
                    household_other_source_of_income_textbox.BorderThickness = new Thickness(1);
                    household_other_source_of_income_textbox.IsReadOnly = true;

                    household_house_status_border.Visibility = Visibility.Visible;
                    household_house_status_border.BorderBrush = Brushes.DarkGray;
                    household_house_status_border.BorderThickness = new Thickness(1);
                    household_house_status_textbox.IsEnabled = false;

                    household_transportation_textbox.Visibility = Visibility.Visible;
                    household_transportation_textbox.BorderBrush = Brushes.DarkGray;
                    household_transportation_textbox.BorderThickness = new Thickness(1);
                    household_transportation_textbox.IsReadOnly = true;
                    break;
            }
        }

        private void Cancel_background_information_btn_Click(object sender, RoutedEventArgs e)
        {
            update_data_background_information_btn.Visibility = Visibility.Hidden;
            cancel_background_information_btn.Visibility = Visibility.Hidden;
            edit_data_background_information_btn.Visibility = Visibility.Visible;

            household_mother_tongue_border.Visibility = Visibility.Visible;
            household_mother_tongue_border.BorderBrush = Brushes.DarkGray;
            household_mother_tongue_border.BorderThickness = new Thickness(1);
            household_mother_tongue_textbox.IsEnabled = false;

            household_house_type_border.Visibility = Visibility.Visible;
            household_house_type_border.BorderBrush = Brushes.DarkGray;
            household_house_type_border.BorderThickness = new Thickness(1);
            household_house_type_textbox.IsEnabled = false;

            household_sanitary_toilet_border.Visibility = Visibility.Visible;
            household_sanitary_toilet_border.BorderBrush = Brushes.DarkGray;
            household_sanitary_toilet_border.BorderThickness = new Thickness(1);
            household_sanitary_toilet_textbox.IsEnabled = false;

            household_immunization_border.Visibility = Visibility.Visible;
            household_immunization_border.BorderBrush = Brushes.DarkGray;
            household_immunization_border.BorderThickness = new Thickness(1);
            household_immunization_textbox.IsEnabled = false;

            household_wra_border.Visibility = Visibility.Visible;
            household_wra_border.BorderBrush = Brushes.DarkGray;
            household_wra_border.BorderThickness = new Thickness(1);
            household_wra_textbox.IsEnabled = false;

            household_garbage_disposal_border.Visibility = Visibility.Visible;
            household_garbage_disposal_border.BorderBrush = Brushes.DarkGray;
            household_garbage_disposal_border.BorderThickness = new Thickness(1);
            household_garbage_disposal_textbox.IsEnabled = false;

            household_water_source_border.Visibility = Visibility.Visible;
            household_water_source_border.BorderBrush = Brushes.DarkGray;
            household_water_source_border.BorderThickness = new Thickness(1);
            household_water_source_textbox.IsEnabled = false;

            household_family_planning_border.Visibility = Visibility.Visible;
            household_family_planning_border.BorderBrush = Brushes.DarkGray;
            household_family_planning_border.BorderThickness = new Thickness(1);
            household_family_planning_textbox.IsEnabled = false;

            household_background_gardening_border.Visibility = Visibility.Visible;
            household_background_gardening_border.BorderBrush = Brushes.DarkGray;
            household_background_gardening_border.BorderThickness = new Thickness(1);
            household_background_gardening_textbox.IsEnabled = false;

            household_livelihood_status_textbox.Visibility = Visibility.Visible;
            household_livelihood_status_textbox.BorderBrush = Brushes.DarkGray;
            household_livelihood_status_textbox.BorderThickness = new Thickness(1);
            household_livelihood_status_textbox.IsReadOnly = true;

            household_animals_border.Visibility = Visibility.Visible;
            household_animals_border.BorderBrush = Brushes.DarkGray;
            household_animals_border.BorderThickness = new Thickness(1);
            household_animals_textbox.IsEnabled = false;

            household_blind_drainage_border.Visibility = Visibility.Visible;
            household_blind_drainage_border.BorderBrush = Brushes.DarkGray;
            household_blind_drainage_border.BorderThickness = new Thickness(1);
            household_blind_drainage_textbox.IsEnabled = false;

            household_communication_textbox.Visibility = Visibility.Visible;
            household_communication_textbox.BorderBrush = Brushes.DarkGray;
            household_communication_textbox.BorderThickness = new Thickness(1);
            household_communication_textbox.IsReadOnly = true;

            household_homelot_status_border.Visibility = Visibility.Visible;
            household_homelot_status_border.BorderBrush = Brushes.DarkGray;
            household_homelot_status_border.BorderThickness = new Thickness(1);
            household_homelot_status_textbox.IsEnabled = false;

            household_energy_source_textbox.Visibility = Visibility.Visible;
            household_energy_source_textbox.BorderBrush = Brushes.DarkGray;
            household_energy_source_textbox.BorderThickness = new Thickness(1);
            household_energy_source_textbox.IsReadOnly = true;

            household_dwtwb_border.Visibility = Visibility.Visible;
            household_dwtwb_border.BorderBrush = Brushes.DarkGray;
            household_dwtwb_border.BorderThickness = new Thickness(1);
            household_dwtwb_textbox.IsEnabled = false;

            household_vulnerable_status_textbox.Visibility = Visibility.Visible;
            household_vulnerable_status_textbox.BorderBrush = Brushes.DarkGray;
            household_vulnerable_status_textbox.BorderThickness = new Thickness(1);
            household_vulnerable_status_textbox.IsReadOnly = true;

            household_agricultural_facility_border.Visibility = Visibility.Visible;
            household_agricultural_facility_border.BorderBrush = Brushes.DarkGray;
            household_agricultural_facility_border.BorderThickness = new Thickness(1);
            household_agricultural_facility_textbox.IsEnabled = false;

            household_other_source_of_income_textbox.Visibility = Visibility.Visible;
            household_other_source_of_income_textbox.BorderBrush = Brushes.DarkGray;
            household_other_source_of_income_textbox.BorderThickness = new Thickness(1);
            household_other_source_of_income_textbox.IsReadOnly = true;

            household_house_status_border.Visibility = Visibility.Visible;
            household_house_status_border.BorderBrush = Brushes.DarkGray;
            household_house_status_border.BorderThickness = new Thickness(1);
            household_house_status_textbox.IsEnabled = false;

            household_transportation_textbox.Visibility = Visibility.Visible;
            household_transportation_textbox.BorderBrush = Brushes.DarkGray;
            household_transportation_textbox.BorderThickness = new Thickness(1);
            household_transportation_textbox.IsReadOnly = true;
        }

        private void Edit_data_product_btn_Click(object sender, RoutedEventArgs e)
        {
            edit_data_product_btn.Visibility = Visibility.Hidden;
            update_data_product_btn.Visibility = Visibility.Visible;
            cancel_product_btn.Visibility = Visibility.Visible;

            newProductImage.Source = new BitmapImage(new Uri(@"img/New Member Icon.png", UriKind.Relative));
            new_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FFDDDDDD");
            new_product_btn.IsEnabled = true;
            new_product_btn.BorderThickness = new Thickness(1);
            new_product_btn.BorderBrush = Brushes.DarkGray;
            new_product_btn.Cursor = Cursors.Hand;

            product_name_textbox.Visibility = Visibility.Visible;
            product_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            product_name_textbox.BorderThickness = new Thickness(2);
            product_name_textbox.IsReadOnly = false;

            productDeleteColumn.Visibility = Visibility.Visible;
            productRequired.Visibility = Visibility.Visible;
        }

        private void Cancel_product_btn_Click(object sender, RoutedEventArgs e)
        {
            edit_data_product_btn.Visibility = Visibility.Visible;
            update_data_product_btn.Visibility = Visibility.Hidden;
            cancel_product_btn.Visibility = Visibility.Hidden;

            newProductImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
            new_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
            new_product_btn.IsEnabled = false;
            new_product_btn.Foreground = Brushes.Black;
            new_product_btn.BorderThickness = new Thickness(1);
            new_product_btn.BorderBrush = Brushes.Black;
            new_product_btn.Cursor = Cursors.Arrow;

            updateImageProduct.Source = new BitmapImage(new Uri(@"img/Update Icon.png", UriKind.Relative));
            update_data_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            update_data_product_btn.IsEnabled = true;
            update_data_product_btn.BorderThickness = new Thickness(1);
            update_data_product_btn.BorderBrush = Brushes.DarkGray;
            update_data_product_btn.Cursor = Cursors.Hand;
            updateProductTextBlock.Foreground = Brushes.White;

            addProduct_btn.Visibility = Visibility.Hidden;
            new_product_btn.Visibility = Visibility.Visible;
            cancel_new_product_btn.Visibility = Visibility.Hidden;

            product_name_textbox.Visibility = Visibility.Visible;
            product_name_textbox.BorderBrush = Brushes.DarkGray;
            product_name_textbox.BorderThickness = new Thickness(1);
            product_name_textbox.IsReadOnly = true;

            productDeleteColumn.Visibility = Visibility.Hidden;
            productViewColumn.Visibility = Visibility.Visible;
            productDisabledDeleteColumn.Visibility = Visibility.Hidden;
            productDisabledViewColumn.Visibility = Visibility.Hidden;

            productRequired.Visibility = Visibility.Hidden;

            //getting first product for product value input
            SqlConnection getFirstProductConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getFirstProductConnection.Open();
            SqlCommand getFirstProductCMD = new SqlCommand();
            getFirstProductCMD.Connection = getFirstProductConnection;
            getFirstProductCMD.CommandText = "SELECT TOP 1 * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
            getFirstProductCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
            getFirstProductCMD.ExecuteNonQuery();

            SqlDataReader getFirstProductDR = getFirstProductCMD.ExecuteReader();
            while (getFirstProductDR.Read())
            {
                product = getFirstProductDR.GetValue(2).ToString();
            }
            getFirstProductDR.Close();
            getFirstProductConnection.Close();

            product_name_textbox.Text = product;

            product_name_textbox.BorderBrush = Brushes.DarkGray;
            product_name_textbox.BorderThickness = new Thickness(1);

        }

        private void Update_data_product_btn_Click(object sender, RoutedEventArgs e)
        {
            if (product_name_textbox.Text == "")
            {
                MessageBox.Show(this, "Product Name field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                product_name_textbox.Focus();
                product_name_textbox.BorderBrush = Brushes.Red;
                product_name_textbox.BorderThickness = new Thickness(2);
                product_name_textbox.IsReadOnly = false;
            }

            else
            {

                if (viewClickProduct == 1)
                {
                    DataRowView getSelectedProductViewRow = product_dataGrid.SelectedItem as DataRowView;
                    string selectedViewProductRow_id = getSelectedProductViewRow.Row[0].ToString();
                    SelectedViewProduct = selectedViewProductRow_id;

                    MessageBoxResult updateProductResult = MessageBox.Show("Do you want to update this product to this household?", "Confirmation", MessageBoxButton.OKCancel);

                    switch (updateProductResult)
                    {
                        case MessageBoxResult.OK:

                            //Updating Product
                            connection.Open();
                            SqlCommand updateProductCMD = new SqlCommand();
                            updateProductCMD.Connection = connection;
                            updateProductCMD.CommandText = "UPDATE farmingProducts SET product_name=@product WHERE product_id = @productID";
                            updateProductCMD.Parameters.AddWithValue("@productID", SelectedViewProduct);
                            updateProductCMD.Parameters.AddWithValue("@product", product_name_textbox.Text);
                            SqlDataAdapter updateProductDA = new SqlDataAdapter(updateProductCMD);
                            DataTable updateProductDT = new DataTable();
                            updateProductDA.Fill(updateProductDT);
                            connection.Close();

                            MessageBox.Show("Product successfully Updated!");

                            connection.Open();
                            string updateProductGrid = "SELECT * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                            SqlCommand updateProductGridCMD = new SqlCommand(updateProductGrid, connection);
                            updateProductGridCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                            updateProductGridCMD.ExecuteNonQuery();
                            SqlDataAdapter getFarmingProductsCountDA = new SqlDataAdapter(updateProductGridCMD);
                            DataTable getFarmingProductsCountDT = new DataTable("farmingProducts");
                            getFarmingProductsCountDA.Fill(getFarmingProductsCountDT);
                            product_dataGrid.ItemsSource = getFarmingProductsCountDT.DefaultView;
                            getFarmingProductsCountDA.Update(getFarmingProductsCountDT);
                            connection.Close();

                            //getting first product for product value input
                            SqlConnection getFirstProductAgainConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                            getFirstProductAgainConnection.Open();
                            SqlCommand getFirstProductAgainCMD = new SqlCommand();
                            getFirstProductAgainCMD.Connection = getFirstProductAgainConnection;
                            getFirstProductAgainCMD.CommandText = "SELECT TOP 1 * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                            getFirstProductAgainCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                            getFirstProductAgainCMD.ExecuteNonQuery();

                            SqlDataReader getFirstProductAgainDR = getFirstProductAgainCMD.ExecuteReader();
                            while (getFirstProductAgainDR.Read())
                            {
                                productID = getFirstProductAgainDR.GetValue(0).ToString();
                                product = getFirstProductAgainDR.GetValue(2).ToString();
                            }
                            getFirstProductAgainDR.Close();
                            getFirstProductAgainConnection.Close();

                            product_name_textbox.Text = product;

                            product_name_textbox.BorderBrush = Brushes.DarkGray;
                            product_name_textbox.BorderThickness = new Thickness(1);
                            product_name_textbox.IsReadOnly = true;

                            addProduct_btn.Visibility = Visibility.Hidden;
                            update_data_product_btn.Visibility = Visibility.Hidden;
                            edit_data_product_btn.Visibility = Visibility.Visible;
                            new_product_btn.Visibility = Visibility.Visible;
                            cancel_new_product_btn.Visibility = Visibility.Hidden;
                            cancel_product_btn.Visibility = Visibility.Hidden;

                            productDeleteColumn.Visibility = Visibility.Hidden;
                            productViewColumn.Visibility = Visibility.Visible;
                            productDisabledDeleteColumn.Visibility = Visibility.Hidden;
                            productDisabledViewColumn.Visibility = Visibility.Hidden;

                            newProductImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                            new_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                            new_product_btn.IsEnabled = false;
                            new_product_btn.Foreground = Brushes.Black;
                            new_product_btn.BorderThickness = new Thickness(1);
                            new_product_btn.BorderBrush = Brushes.Black;
                            new_product_btn.Cursor = Cursors.Arrow;

                            productRequired.Visibility = Visibility.Hidden;

                            product_name_textbox.BorderBrush = Brushes.DarkGray;
                            product_name_textbox.BorderThickness = new Thickness(1);
                            product_name_textbox.IsReadOnly = true;

                            break;
                    }
                }

                else
                {
                    MessageBoxResult updateProductResult = MessageBox.Show("Do you want to update this product to this household?", "Confirmation", MessageBoxButton.OKCancel);

                    switch (updateProductResult)
                    {
                        case MessageBoxResult.OK:
                            //getting first product for product value input
                            SqlConnection getFirstProductConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                            getFirstProductConnection.Open();
                            SqlCommand getFirstProductCMD = new SqlCommand();
                            getFirstProductCMD.Connection = getFirstProductConnection;
                            getFirstProductCMD.CommandText = "SELECT TOP 1 * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                            getFirstProductCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                            getFirstProductCMD.ExecuteNonQuery();

                            SqlDataReader getFirstProductDR = getFirstProductCMD.ExecuteReader();
                            while (getFirstProductDR.Read())
                            {
                                productID = getFirstProductDR.GetValue(0).ToString();
                                product = getFirstProductDR.GetValue(2).ToString();
                            }
                            getFirstProductDR.Close();
                            getFirstProductConnection.Close();

                            //Updating Product
                            connection.Open();
                            SqlCommand updateProductCMD = new SqlCommand();
                            updateProductCMD.Connection = connection;
                            updateProductCMD.CommandText = "UPDATE farmingProducts SET product_name=@product WHERE product_id = @productID";
                            updateProductCMD.Parameters.AddWithValue("@productID", productID);
                            updateProductCMD.Parameters.AddWithValue("@product", product_name_textbox.Text);
                            SqlDataAdapter updateProductDA = new SqlDataAdapter(updateProductCMD);
                            DataTable updateProductDT = new DataTable();
                            updateProductDA.Fill(updateProductDT);
                            connection.Close();

                            MessageBox.Show("Product successfully Updated!");

                            connection.Open();
                            string updateProductGrid = "SELECT * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                            SqlCommand updateProductGridCMD = new SqlCommand(updateProductGrid, connection);
                            updateProductGridCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                            updateProductGridCMD.ExecuteNonQuery();
                            SqlDataAdapter getFarmingProductsCountDA = new SqlDataAdapter(updateProductGridCMD);
                            DataTable getFarmingProductsCountDT = new DataTable("farmingProducts");
                            getFarmingProductsCountDA.Fill(getFarmingProductsCountDT);
                            product_dataGrid.ItemsSource = getFarmingProductsCountDT.DefaultView;
                            getFarmingProductsCountDA.Update(getFarmingProductsCountDT);
                            connection.Close();

                            //getting first product for product value input
                            SqlConnection getFirstProductAgainConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                            getFirstProductAgainConnection.Open();
                            SqlCommand getFirstProductAgainCMD = new SqlCommand();
                            getFirstProductAgainCMD.Connection = getFirstProductAgainConnection;
                            getFirstProductAgainCMD.CommandText = "SELECT TOP 1 * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                            getFirstProductAgainCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                            getFirstProductAgainCMD.ExecuteNonQuery();

                            SqlDataReader getFirstProductAgainDR = getFirstProductAgainCMD.ExecuteReader();
                            while (getFirstProductAgainDR.Read())
                            {
                                productID = getFirstProductAgainDR.GetValue(0).ToString();
                                product = getFirstProductAgainDR.GetValue(2).ToString();
                            }
                            getFirstProductAgainDR.Close();
                            getFirstProductAgainConnection.Close();

                            product_name_textbox.Text = product;

                            product_name_textbox.BorderBrush = Brushes.DarkGray;
                            product_name_textbox.BorderThickness = new Thickness(1);
                            product_name_textbox.IsReadOnly = true;

                            addProduct_btn.Visibility = Visibility.Hidden;
                            update_data_product_btn.Visibility = Visibility.Hidden;
                            edit_data_product_btn.Visibility = Visibility.Visible;
                            new_product_btn.Visibility = Visibility.Visible;
                            cancel_new_product_btn.Visibility = Visibility.Hidden;
                            cancel_product_btn.Visibility = Visibility.Hidden;

                            productDeleteColumn.Visibility = Visibility.Hidden;
                            productViewColumn.Visibility = Visibility.Visible;
                            productDisabledDeleteColumn.Visibility = Visibility.Hidden;
                            productDisabledViewColumn.Visibility = Visibility.Hidden;

                            newProductImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                            new_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                            new_product_btn.IsEnabled = false;
                            new_product_btn.Foreground = Brushes.Black;
                            new_product_btn.BorderThickness = new Thickness(1);
                            new_product_btn.BorderBrush = Brushes.Black;
                            new_product_btn.Cursor = Cursors.Arrow;

                            productRequired.Visibility = Visibility.Hidden;

                            product_name_textbox.BorderBrush = Brushes.DarkGray;
                            product_name_textbox.BorderThickness = new Thickness(1);
                            product_name_textbox.IsReadOnly = true;
                            break;
                    }

                }
            }

        }

        private void New_product_btn_Click(object sender, RoutedEventArgs e)
        {
            updateImageProduct.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
            update_data_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
            update_data_product_btn.IsEnabled = false;
            update_data_product_btn.BorderThickness = new Thickness(1);
            update_data_product_btn.BorderBrush = Brushes.Black;
            update_data_product_btn.Cursor = Cursors.Arrow;
            updateProductTextBlock.Foreground = Brushes.DarkGray;

            addProduct_btn.Visibility = Visibility.Visible;
            new_product_btn.Visibility = Visibility.Hidden;
            cancel_new_product_btn.Visibility = Visibility.Visible;

            productDeleteColumn.Visibility = Visibility.Hidden;
            productViewColumn.Visibility = Visibility.Hidden;
            productDisabledDeleteColumn.Visibility = Visibility.Visible;
            productDisabledViewColumn.Visibility = Visibility.Visible;

            product_name_textbox.Visibility = Visibility.Visible;
            product_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            product_name_textbox.BorderThickness = new Thickness(2);
            product_name_textbox.IsReadOnly = false;

            product_name_textbox.Text = "";
        }

        private void Cancel_new_product_btn_Click(object sender, RoutedEventArgs e)
        {
            addProduct_btn.Visibility = Visibility.Hidden;
            new_product_btn.Visibility = Visibility.Visible;
            cancel_new_product_btn.Visibility = Visibility.Hidden;

            updateImageProduct.Source = new BitmapImage(new Uri(@"img/Update Icon.png", UriKind.Relative));
            update_data_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            update_data_product_btn.IsEnabled = true;
            update_data_product_btn.BorderThickness = new Thickness(1);
            update_data_product_btn.BorderBrush = Brushes.DarkGray;
            update_data_product_btn.Cursor = Cursors.Hand;
            updateProductTextBlock.Foreground = Brushes.White;

            productDeleteColumn.Visibility = Visibility.Visible;
            productViewColumn.Visibility = Visibility.Visible;
            productDisabledDeleteColumn.Visibility = Visibility.Hidden;
            productDisabledViewColumn.Visibility = Visibility.Hidden;

            //getting first product for product value input
            SqlConnection getFirstProductConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getFirstProductConnection.Open();
            SqlCommand getFirstProductCMD = new SqlCommand();
            getFirstProductCMD.Connection = getFirstProductConnection;
            getFirstProductCMD.CommandText = "SELECT TOP 1 * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
            getFirstProductCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
            getFirstProductCMD.ExecuteNonQuery();

            SqlDataReader getFirstProductDR = getFirstProductCMD.ExecuteReader();
            while (getFirstProductDR.Read())
            {
                product = getFirstProductDR.GetValue(2).ToString();
            }
            getFirstProductDR.Close();
            getFirstProductConnection.Close();

            product_name_textbox.Text = product;

            product_name_textbox.Visibility = Visibility.Visible;
            product_name_textbox.BorderBrush = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
            product_name_textbox.BorderThickness = new Thickness(2);
            product_name_textbox.IsReadOnly = false;
        }

        private void AddProduct_btn_Click(object sender, RoutedEventArgs e)
        {
            if (product_name_textbox.Text == "")
            {
                MessageBox.Show(this, "Product Name field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);
                product_name_textbox.Focus();
                product_name_textbox.BorderBrush = Brushes.Red;
                product_name_textbox.BorderThickness = new Thickness(2);
            }

            else
            {

                MessageBoxResult addProductResult = MessageBox.Show("Do you want to add this product to this household?", "Confirmation", MessageBoxButton.OKCancel);

                switch (addProductResult)
                {
                    case MessageBoxResult.OK:
                        //Inserting new product
                        connection.Open();
                        SqlCommand addProductCMD = new SqlCommand();
                        addProductCMD.Connection = connection;
                        addProductCMD.CommandText = "INSERT INTO farmingProducts(product_household_id, product_name) VALUES(@householdID, @productName)";
                        addProductCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                        addProductCMD.Parameters.AddWithValue("@productName", product_name_textbox.Text);
                        SqlDataAdapter addProductDA = new SqlDataAdapter(addProductCMD);
                        DataTable addProductDT = new DataTable();
                        addProductDA.Fill(addProductDT);
                        connection.Close();

                        MessageBox.Show("Product had been added successfully!");

                        connection.Open();
                        string updateProductGrid = "SELECT * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                        SqlCommand updateProductGridCMD = new SqlCommand(updateProductGrid, connection);
                        updateProductGridCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                        updateProductGridCMD.ExecuteNonQuery();
                        SqlDataAdapter getFarmingProductsCountDA = new SqlDataAdapter(updateProductGridCMD);
                        DataTable getFarmingProductsCountDT = new DataTable("farmingProducts");
                        getFarmingProductsCountDA.Fill(getFarmingProductsCountDT);
                        product_dataGrid.ItemsSource = getFarmingProductsCountDT.DefaultView;
                        getFarmingProductsCountDA.Update(getFarmingProductsCountDT);
                        connection.Close();

                        productDeleteColumn.Visibility = Visibility.Hidden;
                        productViewColumn.Visibility = Visibility.Visible;
                        productDisabledDeleteColumn.Visibility = Visibility.Hidden;
                        productDisabledViewColumn.Visibility = Visibility.Hidden;

                        product_name_textbox.Visibility = Visibility.Visible;
                        product_name_textbox.BorderBrush = Brushes.DarkGray;
                        product_name_textbox.BorderThickness = new Thickness(1);
                        product_name_textbox.IsReadOnly = true;

                        addProduct_btn.Visibility = Visibility.Hidden;
                        new_product_btn.Visibility = Visibility.Visible;
                        cancel_new_product_btn.Visibility = Visibility.Hidden;
                        cancel_product_btn.Visibility = Visibility.Hidden;
                        edit_data_product_btn.Visibility = Visibility.Visible;
                        update_data_product_btn.Visibility = Visibility.Hidden;

                        updateImageProduct.Source = new BitmapImage(new Uri(@"img/Update Icon.png", UriKind.Relative));
                        update_data_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
                        update_data_product_btn.IsEnabled = true;
                        update_data_product_btn.BorderThickness = new Thickness(1);
                        update_data_product_btn.BorderBrush = Brushes.DarkGray;
                        update_data_product_btn.Cursor = Cursors.Hand;
                        updateProductTextBlock.Foreground = Brushes.White;

                        newProductImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                        new_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                        new_product_btn.IsEnabled = false;
                        new_product_btn.Foreground = Brushes.Black;
                        new_product_btn.BorderThickness = new Thickness(1);
                        new_product_btn.BorderBrush = Brushes.Black;
                        new_product_btn.Cursor = Cursors.Arrow;

                        //getting first product for product value input
                        SqlConnection getFirstProductConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                        getFirstProductConnection.Open();
                        SqlCommand getFirstProductCMD = new SqlCommand();
                        getFirstProductCMD.Connection = getFirstProductConnection;
                        getFirstProductCMD.CommandText = "SELECT TOP 1 * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                        getFirstProductCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                        getFirstProductCMD.ExecuteNonQuery();

                        SqlDataReader getFirstProductDR = getFirstProductCMD.ExecuteReader();
                        while (getFirstProductDR.Read())
                        {
                            product = getFirstProductDR.GetValue(2).ToString();
                        }
                        getFirstProductDR.Close();
                        getFirstProductConnection.Close();

                        product_name_textbox.Text = product;

                        productRequired.Visibility = Visibility.Hidden;

                        product_name_textbox.BorderBrush = Brushes.DarkGray;
                        product_name_textbox.BorderThickness = new Thickness(1);
                        product_name_textbox.IsReadOnly = true;

                        break;

                    case MessageBoxResult.Cancel:
                        break;
                }
            }
        }

        private void view_product_btn_Click(object sender, RoutedEventArgs e)
        {
            viewClickProduct = 1;

            DataRowView getSelectedProductViewRow = product_dataGrid.SelectedItem as DataRowView;
            string selectedViewProductRow_id = getSelectedProductViewRow.Row[0].ToString();
            SelectedViewProduct = selectedViewProductRow_id;

            //getting selected product for product textbox display
            SqlConnection getSelectedProductConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getSelectedProductConnection.Open();
            SqlCommand getSelectedProductCMD = new SqlCommand();
            getSelectedProductCMD.Connection = getSelectedProductConnection;
            getSelectedProductCMD.CommandText = "SELECT * FROM farmingProducts WHERE product_id = @productID";
            getSelectedProductCMD.Parameters.AddWithValue("@productID", SelectedViewProduct);
            getSelectedProductCMD.ExecuteNonQuery();

            SqlDataReader getSelectedProductDR = getSelectedProductCMD.ExecuteReader();
            while (getSelectedProductDR.Read())
            {
                product = getSelectedProductDR.GetValue(2).ToString();
            }
            getSelectedProductDR.Close();
            getSelectedProductConnection.Close();

            product_name_textbox.Text = product;

        }


        private void delete_product_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedProductDeleteRow = product_dataGrid.SelectedItem as DataRowView;
            string selectedDeleteProductRow_id = getSelectedProductDeleteRow.Row[0].ToString();
            SelectedDeleteProduct = selectedDeleteProductRow_id;

            MessageBoxResult addProductResult = MessageBox.Show("Do you want to delete this product to this household?", "Confirmation", MessageBoxButton.OKCancel);

            switch (addProductResult)
            {
                case MessageBoxResult.OK:
                    //Delete product
                    connection.Open();
                    SqlCommand deleteProductCMD = new SqlCommand();
                    deleteProductCMD.Connection = connection;
                    deleteProductCMD.CommandText = "DELETE FROM farmingProducts WHERE product_id = @productID";
                    deleteProductCMD.Parameters.AddWithValue("@productID", SelectedDeleteProduct);
                    SqlDataAdapter deleteProductDA = new SqlDataAdapter(deleteProductCMD);
                    DataTable deleteProductDT = new DataTable();
                    deleteProductDA.Fill(deleteProductDT);
                    connection.Close();

                    MessageBox.Show("Product had been deleted successfully!");

                    connection.Open();
                    string updateProductGrid = "SELECT * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                    SqlCommand updateProductGridCMD = new SqlCommand(updateProductGrid, connection);
                    updateProductGridCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    updateProductGridCMD.ExecuteNonQuery();
                    SqlDataAdapter getFarmingProductsCountDA = new SqlDataAdapter(updateProductGridCMD);
                    DataTable getFarmingProductsCountDT = new DataTable("farmingProducts");
                    getFarmingProductsCountDA.Fill(getFarmingProductsCountDT);
                    product_dataGrid.ItemsSource = getFarmingProductsCountDT.DefaultView;
                    getFarmingProductsCountDA.Update(getFarmingProductsCountDT);
                    connection.Close();

                    productDeleteColumn.Visibility = Visibility.Hidden;
                    productViewColumn.Visibility = Visibility.Visible;
                    productDisabledDeleteColumn.Visibility = Visibility.Hidden;
                    productDisabledViewColumn.Visibility = Visibility.Hidden;

                    product_name_textbox.Visibility = Visibility.Visible;
                    product_name_textbox.BorderBrush = Brushes.DarkGray;
                    product_name_textbox.BorderThickness = new Thickness(1);
                    product_name_textbox.IsReadOnly = true;

                    addProduct_btn.Visibility = Visibility.Hidden;
                    new_product_btn.Visibility = Visibility.Visible;
                    cancel_new_product_btn.Visibility = Visibility.Hidden;
                    cancel_product_btn.Visibility = Visibility.Hidden;
                    edit_data_product_btn.Visibility = Visibility.Visible;
                    update_data_product_btn.Visibility = Visibility.Hidden;

                    updateImageProduct.Source = new BitmapImage(new Uri(@"img/Update Icon.png", UriKind.Relative));
                    update_data_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF47C144");
                    update_data_product_btn.IsEnabled = true;
                    update_data_product_btn.BorderThickness = new Thickness(1);
                    update_data_product_btn.BorderBrush = Brushes.DarkGray;
                    update_data_product_btn.Cursor = Cursors.Hand;
                    updateProductTextBlock.Foreground = Brushes.White;

                    newProductImage.Source = new BitmapImage(new Uri(@"img/Not Allowed Icon.png", UriKind.Relative));
                    new_product_btn.Background = (Brush)new BrushConverter().ConvertFrom("#FF458DA8");
                    new_product_btn.IsEnabled = false;
                    new_product_btn.Foreground = Brushes.Black;
                    new_product_btn.BorderThickness = new Thickness(1);
                    new_product_btn.BorderBrush = Brushes.Black;
                    new_product_btn.Cursor = Cursors.Arrow;

                    //getting first product for product value input
                    SqlConnection getFirstProductConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    getFirstProductConnection.Open();
                    SqlCommand getFirstProductCMD = new SqlCommand();
                    getFirstProductCMD.Connection = getFirstProductConnection;
                    getFirstProductCMD.CommandText = "SELECT TOP 1 * FROM farmingProducts WHERE product_household_id = @householdID ORDER BY product_name";
                    getFirstProductCMD.Parameters.AddWithValue("@householdID", selectedIDhouseID);
                    getFirstProductCMD.ExecuteNonQuery();

                    SqlDataReader getFirstProductDR = getFirstProductCMD.ExecuteReader();
                    while (getFirstProductDR.Read())
                    {
                        product = getFirstProductDR.GetValue(2).ToString();
                    }
                    getFirstProductDR.Close();
                    getFirstProductConnection.Close();

                    product_name_textbox.Text = product;

                    productRequired.Visibility = Visibility.Hidden;

                    break;

                case MessageBoxResult.Cancel:
                    break;
            }
        }

    }
}
