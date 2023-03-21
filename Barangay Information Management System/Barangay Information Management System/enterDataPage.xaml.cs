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
    /// Interaction logic for enterDataPage.xaml
    /// </summary>
    /// 

    public partial class enterDataPage : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String household_id;

        String temporaryFamilyMembers_full_name;
        String temporaryFamilyMembers_first_name;
        String temporaryFamilyMembers_middle_name;
        String temporaryFamilyMembers_last_name;
        String temporaryFamilyMembers_suffix;
        String temporaryFamilyMembers_head_or_member;
        String temporaryFamilyMembers_dependency;
        String temporaryFamilyMembers_tribe;
        String temporaryFamilyMembers_sex;
        String temporaryFamilyMembers_bdate;
        String temporaryFamilyMembers_age;
        String temporaryFamilyMembers_religion;
        String temporaryFamilyMembers_education;
        String temporaryFamilyMembers_occupation;
        String temporaryFamilyMembers_relationship;
        String temporaryFamilyMembers_pwd;
        String temporaryFamilyMembers_ip;
        String temporaryFamilyMembers_philhealth;
        String temporaryFamilyMembers_breast_feeding;
        String temporaryFamilyMembers_ntp;
        String temporaryFamilyMembers_smooking;
        String temporaryFamilyMembers_fourps;

        String barangay;

        String purok, tribe, religion, education,relation, mothertounge, housetype, sanitarytoilet, garbageDisposal, waterSource, homelotstatus, housestatus;

        String temporaryProducts_name;

        int family_number_count = 0;

        MySqlConnection onlineConnection;
        string onlineConnectionString;

        //private ObservableCollection<Member> member;
        public DataTable Temporary_Members { get; set; }
        public DataTable Temporary_product { get; set; }


        public enterDataPage()
        {
            InitializeComponent();

            MaxHeight = SystemParameters.MaximizedPrimaryScreenHeight;
            MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

            Temporary_Members = new DataTable()
            {
                Columns = {
                 new DataColumn("Account ID", typeof(int)),
                 new DataColumn("Last Name", typeof(string)),
             }
            };

            Temporary_product = new DataTable()
            {
                Columns = {
                 new DataColumn("Product ID", typeof(int)),
                 new DataColumn("Product Name", typeof(string)),
             }
            };

            connection.Open();
            SqlCommand getBarangayCMD = new SqlCommand();
            getBarangayCMD.Connection = connection;
            getBarangayCMD.CommandText = "SELECT * FROM barangay WHERE barangay_id = 1 ";
            getBarangayCMD.ExecuteNonQuery();

            SqlDataReader getBarangayDR = getBarangayCMD.ExecuteReader();
            if (getBarangayDR.Read())
            {
                barangay = getBarangayDR.GetValue(1).ToString();
                getBarangayDR.Close();
                connection.Close();
            }

            barangayTextbox.Text = barangay;

            //getting purok List
            SqlConnection getPurokListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getPurokListConnection.Open();
            SqlCommand getPurokListCMD = new SqlCommand();
            getPurokListCMD.Connection = getPurokListConnection;
            getPurokListCMD.CommandText = "SELECT * FROM purokList WHERE barangay=@barangay ORDER BY name";
            getPurokListCMD.Parameters.AddWithValue("@barangay", barangay);
            getPurokListCMD.ExecuteNonQuery();

            SqlDataReader getPurokListDR = getPurokListCMD.ExecuteReader();
            while (getPurokListDR.Read())
            {
                purok = getPurokListDR.GetValue(1).ToString();
                purokTextbox.Items.Add(purok);
            }
            getPurokListDR.Close();
            getPurokListConnection.Close();

            //getting tribe list
            SqlConnection getTribeListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getTribeListConnection.Open();
            SqlCommand getTribeListCMD = new SqlCommand();
            getTribeListCMD.Connection = getTribeListConnection;
            getTribeListCMD.CommandText = "SELECT * FROM tribeList ORDER BY name";
            getTribeListCMD.ExecuteNonQuery();

            SqlDataReader getTribeListDR = getTribeListCMD.ExecuteReader();
            while (getTribeListDR.Read())
            {
                tribe = getTribeListDR.GetValue(1).ToString();
                head_tribe_Textbox.Items.Add(tribe);
                temporary_member_tribe_textbox.Items.Add(tribe);
            }
            getTribeListDR.Close();
            getTribeListConnection.Close();

            //getting religion list
            SqlConnection getReligionListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getReligionListConnection.Open();
            SqlCommand getReligionListCMD = new SqlCommand();
            getReligionListCMD.Connection = getReligionListConnection;
            getReligionListCMD.CommandText = "SELECT * FROM religionList ORDER BY name";
            getReligionListCMD.ExecuteNonQuery();

            SqlDataReader getReligionListDR = getReligionListCMD.ExecuteReader();
            while (getReligionListDR.Read())
            {
                religion = getReligionListDR.GetValue(1).ToString();
                head_religion_Textbox.Items.Add(religion);
                temporary_member_religion_textbox.Items.Add(religion);
            }
            getReligionListDR.Close();
            getReligionListConnection.Close();

            //getting education list
            SqlConnection getEducationListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getEducationListConnection.Open();
            SqlCommand getEducationListCMD = new SqlCommand();
            getEducationListCMD.Connection = getEducationListConnection;
            getEducationListCMD.CommandText = "SELECT * FROM educationList";
            getEducationListCMD.ExecuteNonQuery();

            SqlDataReader getEducationListDR = getEducationListCMD.ExecuteReader();
            while (getEducationListDR.Read())
            {
                education = getEducationListDR.GetValue(1).ToString();
                head_education_Textbox.Items.Add(education);
                temporary_member_education_textbox.Items.Add(education);
            }
            getEducationListDR.Close();
            getEducationListConnection.Close();

            //getting relation list
            SqlConnection getRelationListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getRelationListConnection.Open();
            SqlCommand getRelationListCMD = new SqlCommand();
            getRelationListCMD.Connection = getRelationListConnection;
            getRelationListCMD.CommandText = "SELECT * FROM relationList";
            getRelationListCMD.ExecuteNonQuery();

            SqlDataReader getRelationListDR = getRelationListCMD.ExecuteReader();
            while (getRelationListDR.Read())
            {
                relation = getRelationListDR.GetValue(1).ToString();
                head_relation_Textbox.Items.Add(relation);
                temporary_member_relationship_textbox.Items.Add(relation);
            }
            getEducationListDR.Close();
            getRelationListConnection.Close();

            //getting mother tounge list
            SqlConnection getMothertoungeListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getMothertoungeListConnection.Open();
            SqlCommand getMothertoungeListCMD = new SqlCommand();
            getMothertoungeListCMD.Connection = getMothertoungeListConnection;
            getMothertoungeListCMD.CommandText = "SELECT * FROM motherToungeList ORDER BY name";
            getMothertoungeListCMD.ExecuteNonQuery();

            SqlDataReader getMothertoungeListDR = getMothertoungeListCMD.ExecuteReader();
            while (getMothertoungeListDR.Read())
            {
                mothertounge = getMothertoungeListDR.GetValue(1).ToString();
                household_mother_tongue_textbox.Items.Add(mothertounge);
            }
            getEducationListDR.Close();
            getMothertoungeListConnection.Close();

            //getting housetype list
            SqlConnection getHousetypeListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getHousetypeListConnection.Open();
            SqlCommand getHousetypeListCMD = new SqlCommand();
            getHousetypeListCMD.Connection = getHousetypeListConnection;
            getHousetypeListCMD.CommandText = "SELECT * FROM housetypeList ORDER BY name";
            getHousetypeListCMD.ExecuteNonQuery();

            SqlDataReader getHousetypeListDR = getHousetypeListCMD.ExecuteReader();
            while (getHousetypeListDR.Read())
            {
                housetype = getHousetypeListDR.GetValue(1).ToString();
                household_house_type_textbox.Items.Add(housetype);
            }
            getHousetypeListDR.Close();
            getHousetypeListConnection.Close();

            //getting sanitary toilet list
            SqlConnection getSanitaryToiletListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getSanitaryToiletListConnection.Open();
            SqlCommand getSanitaryToiletListCMD = new SqlCommand();
            getSanitaryToiletListCMD.Connection = getSanitaryToiletListConnection;
            getSanitaryToiletListCMD.CommandText = "SELECT * FROM sanitaryToiletList ORDER BY name";
            getSanitaryToiletListCMD.ExecuteNonQuery();

            SqlDataReader getSanitaryToiletListDR = getSanitaryToiletListCMD.ExecuteReader();
            while (getSanitaryToiletListDR.Read())
            {
                sanitarytoilet = getSanitaryToiletListDR.GetValue(1).ToString();
                household_sanitary_toilet_textbox.Items.Add(sanitarytoilet);
            }
            getSanitaryToiletListDR.Close();
            getSanitaryToiletListConnection.Close();

            //getting garbage disposal list
            SqlConnection getGarbageDisposalListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getGarbageDisposalListConnection.Open();
            SqlCommand getGarbageDisposalListCMD = new SqlCommand();
            getGarbageDisposalListCMD.Connection = getGarbageDisposalListConnection;
            getGarbageDisposalListCMD.CommandText = "SELECT * FROM garbageDisposalList ORDER BY name";
            getGarbageDisposalListCMD.ExecuteNonQuery();

            SqlDataReader getGarbageDisposalListDR = getGarbageDisposalListCMD.ExecuteReader();
            while (getGarbageDisposalListDR.Read())
            {
                garbageDisposal = getGarbageDisposalListDR.GetValue(1).ToString();
                household_garbage_disposal_textbox.Items.Add(garbageDisposal);
            }
            getGarbageDisposalListDR.Close();
            getGarbageDisposalListConnection.Close();

            //getting water source list
            SqlConnection getWaterSourceListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getWaterSourceListConnection.Open();
            SqlCommand getWaterSourceListCMD = new SqlCommand();
            getWaterSourceListCMD.Connection = getWaterSourceListConnection;
            getWaterSourceListCMD.CommandText = "SELECT * FROM waterSourceList ORDER BY name";
            getWaterSourceListCMD.ExecuteNonQuery();

            SqlDataReader getWaterSourceListDR = getWaterSourceListCMD.ExecuteReader();
            while (getWaterSourceListDR.Read())
            {
                waterSource = getWaterSourceListDR.GetValue(1).ToString();
                household_water_source_textbox.Items.Add(waterSource);
            }
            getWaterSourceListDR.Close();
            getWaterSourceListConnection.Close();

            //getting homelot status list
            SqlConnection getHomelotStatusListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getHomelotStatusListConnection.Open();
            SqlCommand getHomelotStatusListCMD = new SqlCommand();
            getHomelotStatusListCMD.Connection = getHomelotStatusListConnection;
            getHomelotStatusListCMD.CommandText = "SELECT * FROM homelotStatusList ORDER BY name";
            getHomelotStatusListCMD.ExecuteNonQuery();

            SqlDataReader getHomelotStatusListDR = getHomelotStatusListCMD.ExecuteReader();
            while (getHomelotStatusListDR.Read())
            {
                homelotstatus = getHomelotStatusListDR.GetValue(1).ToString();
                household_homelot_status_textbox.Items.Add(homelotstatus);
            }
            getHomelotStatusListDR.Close();
            getHomelotStatusListConnection.Close();

            //getting house status list
            SqlConnection getHouseStatusListConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            getHouseStatusListConnection.Open();
            SqlCommand getHouseStatusListCMD = new SqlCommand();
            getHouseStatusListCMD.Connection = getHouseStatusListConnection;
            getHouseStatusListCMD.CommandText = "SELECT * FROM houseStatusList ORDER BY name";
            getHouseStatusListCMD.ExecuteNonQuery();

            SqlDataReader getHouseStatusListDR = getHouseStatusListCMD.ExecuteReader();
            while (getHouseStatusListDR.Read())
            {
                housestatus = getHouseStatusListDR.GetValue(1).ToString();
                household_house_status_textbox.Items.Add(housestatus);
            }
            getHouseStatusListDR.Close();
            getHouseStatusListConnection.Close();

            purok_border.BorderBrush = Brushes.DarkGray;
            purok_border.BorderThickness = new Thickness(0);

            connection.Open();
            SqlCommand deleteAllTemporaryMemberCMD = new SqlCommand();
            deleteAllTemporaryMemberCMD.Connection = connection;
            deleteAllTemporaryMemberCMD.CommandText = "DELETE FROM temporaryFamilyMembers";
            SqlDataAdapter deleteAllTemporaryMemberDA = new SqlDataAdapter(deleteAllTemporaryMemberCMD);
            DataTable deleteAllTemporaryMemberDT = new DataTable();
            deleteAllTemporaryMemberDA.Fill(deleteAllTemporaryMemberDT);
            connection.Close();

            connection.Open();
            SqlCommand deleteAllTemporaryProductsCMD = new SqlCommand();
            deleteAllTemporaryProductsCMD.Connection = connection;
            deleteAllTemporaryProductsCMD.CommandText = "DELETE FROM temporaryProducts";
            SqlDataAdapter deleteAllTemporaryProductsDA = new SqlDataAdapter(deleteAllTemporaryProductsCMD);
            DataTable deleteAllTemporaryProductsDT = new DataTable();
            deleteAllTemporaryProductsDA.Fill(deleteAllTemporaryProductsDT);
            connection.Close();

            connection.Open();
            string refreshTemporaryFamilyMembers = "SELECT * FROM temporaryFamilyMembers";
            SqlCommand refreshTemporaryFamilyMembersCMD = new SqlCommand(refreshTemporaryFamilyMembers, connection);
            refreshTemporaryFamilyMembersCMD.ExecuteNonQuery();
            SqlDataAdapter refreshTemporaryFamilyMembersDA = new SqlDataAdapter(refreshTemporaryFamilyMembersCMD);
            DataTable refreshTemporaryFamilyMembersDT = new DataTable("temporaryFamilyMembers");
            refreshTemporaryFamilyMembersDA.Fill(refreshTemporaryFamilyMembersDT);
            member_dataGrid.ItemsSource = refreshTemporaryFamilyMembersDT.DefaultView;
            refreshTemporaryFamilyMembersDA.Update(refreshTemporaryFamilyMembersDT);
            connection.Close();

            connection.Open();
            string refreshTemporaryProduct = "SELECT * FROM temporaryProducts";
            SqlCommand refreshTemporaryProductCMD = new SqlCommand(refreshTemporaryProduct, connection);
            refreshTemporaryProductCMD.ExecuteNonQuery();
            SqlDataAdapter refreshTemporaryProductDA = new SqlDataAdapter(refreshTemporaryProductCMD);
            DataTable refreshTemporaryProductDT = new DataTable("temporaryProducts");
            refreshTemporaryProductDA.Fill(refreshTemporaryProductDT);
            product_dataGrid.ItemsSource = refreshTemporaryProductDT.DefaultView;
            refreshTemporaryProductDA.Update(refreshTemporaryProductDT);
            connection.Close();

            empty_member_dataGrid.Visibility = Visibility.Visible;
            member_dataGrid.Visibility = Visibility.Hidden;

            empty_product_dataGrid.Visibility = Visibility.Visible;
            product_dataGrid.Visibility = Visibility.Hidden;
        }


        private void head_age(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void member_age(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void temporary_family_member_delete_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedRow = member_dataGrid.SelectedItem as DataRowView;
            string selectedRow_id = getSelectedRow.Row[0].ToString();

            connection.Open();
            SqlCommand deleteTemporaryMemberCMD = new SqlCommand();
            deleteTemporaryMemberCMD.Connection = connection;
            deleteTemporaryMemberCMD.CommandText = "DELETE FROM temporaryFamilyMembers WHERE temporary_family_member_id=@id";
            deleteTemporaryMemberCMD.Parameters.AddWithValue("@id", selectedRow_id);
            SqlDataAdapter deleteTemporaryMemberDA = new SqlDataAdapter(deleteTemporaryMemberCMD);
            DataTable deleteTemporaryMemberDT = new DataTable();
            deleteTemporaryMemberDA.Fill(deleteTemporaryMemberDT);
            connection.Close();

            connection.Open();
            string updateTemporaryMemberList = "SELECT * FROM temporaryFamilyMembers";
            SqlCommand updateTemporaryMemberListCMD = new SqlCommand(updateTemporaryMemberList, connection);
            updateTemporaryMemberListCMD.ExecuteNonQuery();
            SqlDataAdapter updateTemporaryMemberListDA = new SqlDataAdapter(updateTemporaryMemberListCMD);
            DataTable updateTemporaryMemberListDT = new DataTable("account");
            updateTemporaryMemberListDA.Fill(updateTemporaryMemberListDT);
            member_dataGrid.ItemsSource = updateTemporaryMemberListDT.DefaultView;
            updateTemporaryMemberListDA.Update(updateTemporaryMemberListDT);
            connection.Close();

            if (member_dataGrid.Items.Count == 0)
            {
                empty_member_dataGrid.Visibility = Visibility.Visible;
                member_dataGrid.Visibility = Visibility.Hidden;
            }
        }

        private void temporary_product_delete_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedRow = product_dataGrid.SelectedItem as DataRowView;
            string selectedRow_id = getSelectedRow.Row[0].ToString();

            empty_member_dataGrid.Visibility = Visibility.Hidden;
            member_dataGrid.Visibility = Visibility.Visible;

            connection.Open();
            SqlCommand deleteTemporaryProductCMD = new SqlCommand();
            deleteTemporaryProductCMD.Connection = connection;
            deleteTemporaryProductCMD.CommandText = "DELETE FROM temporaryProducts WHERE temporary_product_id=@id";
            deleteTemporaryProductCMD.Parameters.AddWithValue("@id", selectedRow_id);
            SqlDataAdapter deleteTemporaryProductDA = new SqlDataAdapter(deleteTemporaryProductCMD);
            DataTable deleteTemporaryProductDT = new DataTable();
            deleteTemporaryProductDA.Fill(deleteTemporaryProductDT);
            connection.Close();

            connection.Open();
            string updateTemporaryProductList = "SELECT * FROM temporaryProducts";
            SqlCommand updateTemporaryProductListCMD = new SqlCommand(updateTemporaryProductList, connection);
            updateTemporaryProductListCMD.ExecuteNonQuery();
            SqlDataAdapter updateTemporaryProductListDA = new SqlDataAdapter(updateTemporaryProductListCMD);
            DataTable updateTemporaryProductListDT = new DataTable("account");
            updateTemporaryProductListDA.Fill(updateTemporaryProductListDT);
            product_dataGrid.ItemsSource = updateTemporaryProductListDT.DefaultView;
            updateTemporaryProductListDA.Update(updateTemporaryProductListDT);
            connection.Close();

            if (product_dataGrid.Items.Count == 0)
            {
                empty_product_dataGrid.Visibility = Visibility.Visible;
                product_dataGrid.Visibility = Visibility.Hidden;
            }
        }

        private void AddMember_btn_Click(object sender, RoutedEventArgs e)
        {
            //checking empty member input box
            if (String.IsNullOrEmpty(temporary_member_first_name_textbox.Text) || String.IsNullOrEmpty(temporary_member_middle_name_textbox.Text) || String.IsNullOrEmpty(temporary_member_last_name_textbox.Text))
            {
                MessageBox.Show(this, "Name should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                //member first name
                if (temporary_member_first_name_textbox.Text == "")
                {
                    temporary_member_first_name_textbox.BorderBrush = Brushes.Red;

                    temporary_member_first_name_textbox.Focus();

                    if (temporary_member_middle_name_textbox.Text == "")
                    {
                        temporary_member_middle_name_textbox.BorderBrush = Brushes.Red;
                    }

                    if (temporary_member_last_name_textbox.Text == "")
                    {
                        temporary_member_last_name_textbox.BorderBrush = Brushes.Red;
                    }

                    if (temporary_member_middle_name_textbox.Text != "")
                    {
                        temporary_member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                    }

                    if (temporary_member_last_name_textbox.Text != "")
                    {
                        temporary_member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                    }
                }
                //

                //member middle name
                else if (temporary_member_middle_name_textbox.Text == "")
                {
                    temporary_member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                    temporary_member_middle_name_textbox.BorderBrush = Brushes.Red;

                    temporary_member_middle_name_textbox.Focus();

                    if (temporary_member_last_name_textbox.Text == "")
                    {
                        temporary_member_last_name_textbox.BorderBrush = Brushes.Red;
                    }

                    else
                    {
                        temporary_member_last_name_textbox.BorderBrush = Brushes.DarkGray;
                    }
                }
                //

                //member last name
                else if (temporary_member_last_name_textbox.Text == "")
                {
                    temporary_member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                    temporary_member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                    temporary_member_last_name_textbox.BorderBrush = Brushes.Red;

                    temporary_member_last_name_textbox.Focus();
                }
                //
            }
            //end checking

            else
            {
                temporary_member_first_name_textbox.BorderBrush = Brushes.DarkGray;
                temporary_member_middle_name_textbox.BorderBrush = Brushes.DarkGray;
                temporary_member_last_name_textbox.BorderBrush = Brushes.DarkGray;

                empty_member_dataGrid.Visibility = Visibility.Hidden;
                member_dataGrid.Visibility = Visibility.Visible;

                connection.Open();
                SqlCommand addTemporaryMemberCMD = new SqlCommand();
                addTemporaryMemberCMD.Connection = connection;
                addTemporaryMemberCMD.CommandText = "INSERT INTO temporaryFamilyMembers(temporary_full_name, temporary_first_name, temporary_middle_name, temporary_last_name, temporary_suffix, temporary_head_or_member, temporary_dependency, temporary_tribe, temporary_sex, temporary_bdate, temporary_age, temporary_religion, temporary_education, temporary_occupation, temporary_relationship, temporary_pwd, temporary_ip, temporary_philhealth, temporary_breast_feeding, temporary_ntp, temporary_smooking, temporary_fourps) VALUES(@temporary_first_name + ' ' + @temporary_middle_name + ' ' + @temporary_last_name + ' ' + @temporary_suffix, @temporary_first_name, @temporary_middle_name, @temporary_last_name, @temporary_suffix, 'Member', @temporary_dependency, @temporary_tribe, @temporary_sex, @temporary_bdate, @temporary_age, @temporary_religion, @temporary_education, @temporary_occupation, @temporary_relationship, @temporary_pwd, @temporary_ip, @temporary_philhealth, @temporary_breast_feeding, @temporary_ntp, @temporary_smooking, @temporary_fourps)";
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_first_name", temporary_member_first_name_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_middle_name", temporary_member_middle_name_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_last_name", temporary_member_last_name_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_suffix", temporary_member_suffix_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_dependency", temporary_member_dependency_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_tribe", temporary_member_tribe_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_sex", temporary_member_sex_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_bdate", temporary_member_bdate_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_age", temporary_member_age_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_religion", temporary_member_religion_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_education", temporary_member_education_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_occupation", temporary_member_occupation_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_relationship", temporary_member_relationship_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_pwd", temporary_member_pwd_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_ip", temporary_member_ip_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_philhealth", temporary_member_philhealth_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_breast_feeding", temporary_member_breast_feeding_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_ntp", temporary_member_ntp_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_smooking", temporary_member_smooking_textbox.Text);
                addTemporaryMemberCMD.Parameters.AddWithValue("@temporary_fourps", temporary_member_fourps_textbox.Text);
                SqlDataAdapter addTemporaryMemberDA = new SqlDataAdapter(addTemporaryMemberCMD);
                DataTable addTemporaryMemberDT = new DataTable();
                addTemporaryMemberDA.Fill(addTemporaryMemberDT);
                connection.Close();

                connection.Open();
                string getTemporaryFamilyMembers = "SELECT * FROM temporaryFamilyMembers";
                SqlCommand getTemporaryFamilyMembersCMD = new SqlCommand(getTemporaryFamilyMembers, connection);
                getTemporaryFamilyMembersCMD.ExecuteNonQuery();
                SqlDataAdapter getTemporaryFamilyMembersDA = new SqlDataAdapter(getTemporaryFamilyMembersCMD);
                DataTable getTemporaryFamilyMembersDT = new DataTable("temporaryFamilyMembers");
                getTemporaryFamilyMembersDA.Fill(getTemporaryFamilyMembersDT);
                member_dataGrid.ItemsSource = getTemporaryFamilyMembersDT.DefaultView;
                getTemporaryFamilyMembersDA.Update(getTemporaryFamilyMembersDT);
                connection.Close();

                temporary_member_first_name_textbox.Text = "";
                temporary_member_middle_name_textbox.Text = "";
                temporary_member_last_name_textbox.Text = "";
                temporary_member_suffix_textbox.Text = "";
                temporary_member_dependency_textbox.Text = "";
                temporary_member_tribe_textbox.Text = "";
                temporary_member_sex_textbox.Text = "";
                temporary_member_bdate_textbox.Text = "";
                temporary_member_age_textbox.Text = "";
                temporary_member_religion_textbox.Text = "";
                temporary_member_education_textbox.Text = "";
                temporary_member_occupation_textbox.Text = "";
                temporary_member_relationship_textbox.Text = "";
                temporary_member_pwd_textbox.Text = "";
                temporary_member_ip_textbox.Text = "";
                temporary_member_philhealth_textbox.Text = "";
                temporary_member_breast_feeding_textbox.Text = "";
                temporary_member_ntp_textbox.Text = "";
                temporary_member_smooking_textbox.Text = "";
                temporary_member_fourps_textbox.Text = "";
            }
        }

        private void AddProduct_btn_Click(object sender, RoutedEventArgs e)
        {
            //checking empty product fields
            if (String.IsNullOrEmpty(product_name_textbox.Text))
            {
                MessageBox.Show(this, "Product name should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                product_name_textbox.BorderBrush = Brushes.Red;

                purok_border.BorderBrush = Brushes.Red;
                purok_border.BorderThickness = new Thickness(1);

                product_name_textbox.Focus();

            }
            //


            else
            {
                empty_product_dataGrid.Visibility = Visibility.Hidden;
                product_dataGrid.Visibility = Visibility.Visible;

                product_name_textbox.BorderBrush = Brushes.DarkGray;

                connection.Open();
                SqlCommand addTemporaryProductCMD = new SqlCommand();
                addTemporaryProductCMD.Connection = connection;
                addTemporaryProductCMD.CommandText = "INSERT INTO temporaryProducts(temporary_product_name) VALUES(@temporary_product_name)";
                addTemporaryProductCMD.Parameters.AddWithValue("@temporary_product_name", product_name_textbox.Text);
                SqlDataAdapter addTemporaryProductDA = new SqlDataAdapter(addTemporaryProductCMD);
                DataTable addTemporaryProductDT = new DataTable();
                addTemporaryProductDA.Fill(addTemporaryProductDT);
                connection.Close();

                connection.Open();
                string getTemporaryProduct = "SELECT * FROM temporaryProducts";
                SqlCommand getTemporaryProductCMD = new SqlCommand(getTemporaryProduct, connection);
                getTemporaryProductCMD.ExecuteNonQuery();
                SqlDataAdapter getTemporaryProductDA = new SqlDataAdapter(getTemporaryProductCMD);
                DataTable getTemporaryProductDT = new DataTable("temporaryProducts");
                getTemporaryProductDA.Fill(getTemporaryProductDT);
                product_dataGrid.ItemsSource = getTemporaryProductDT.DefaultView;
                getTemporaryProductDA.Update(getTemporaryProductDT);
                connection.Close();

                product_name_textbox.Text = "";
            }
        }

        private void submit_data_btn_Click(object sender, RoutedEventArgs e)
        {
            //checking empty fields
            if (String.IsNullOrEmpty(purokTextbox.Text) || String.IsNullOrEmpty(head_first_name_Textbox.Text) || String.IsNullOrEmpty(head_middle_name_Textbox.Text) || String.IsNullOrEmpty(head_last_name_Textbox.Text))
            {
                //purok
                if (String.IsNullOrEmpty(purokTextbox.Text))
                {
                    MessageBox.Show(this, "Purok input field should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                    purok_border.BorderBrush = Brushes.Red;
                    purok_border.BorderThickness = new Thickness(1.5, 1, 1.5, 1);


                    purokTextbox.Focus();

                }
                //


                //head first name
                else if (head_first_name_Textbox.Text == "")
                {
                    MessageBox.Show(this, "Name should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                    purok_border.BorderBrush = Brushes.DarkGray;
                    purok_border.BorderThickness = new Thickness(0);
                    head_first_name_Textbox.BorderBrush = Brushes.Red;

                    head_first_name_Textbox.Focus();

                    if (head_middle_name_Textbox.Text == "")
                    {
                        head_middle_name_Textbox.BorderBrush = Brushes.Red;
                    }

                    if (head_last_name_Textbox.Text == "")
                    {
                        head_last_name_Textbox.BorderBrush = Brushes.Red;
                    }


                    if (head_middle_name_Textbox.Text != "")
                    {
                        head_middle_name_Textbox.BorderBrush = Brushes.DarkGray;
                    }

                    if (head_last_name_Textbox.Text != "")
                    {
                        head_last_name_Textbox.BorderBrush = Brushes.DarkGray;
                    }
                }
                //

                //head middle name
                else if (head_middle_name_Textbox.Text == "")
                {
                    MessageBox.Show(this, "Name should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                    purokTextbox.BorderBrush = Brushes.DarkGray;
                    head_first_name_Textbox.BorderBrush = Brushes.DarkGray;
                    head_middle_name_Textbox.BorderBrush = Brushes.Red;

                    head_middle_name_Textbox.Focus();

                    if (head_last_name_Textbox.Text == "")
                    {
                        head_last_name_Textbox.BorderBrush = Brushes.Red;
                    }

                    else
                    {
                        head_last_name_Textbox.BorderBrush = Brushes.DarkGray;
                    }
                }
                //

                //head last name
                else if (head_last_name_Textbox.Text == "")
                {
                    MessageBox.Show(this, "Name should not be empty!", "Confirmation", MessageBoxButton.OK, MessageBoxImage.Warning);

                    purokTextbox.BorderBrush = Brushes.DarkGray;
                    head_first_name_Textbox.BorderBrush = Brushes.DarkGray;
                    head_middle_name_Textbox.BorderBrush = Brushes.DarkGray;
                    head_last_name_Textbox.BorderBrush = Brushes.Red;

                    head_last_name_Textbox.Focus();
                }
                //
            }
            //

            else
            {
                purok_border.BorderBrush = Brushes.DarkGray;
                purok_border.BorderThickness = new Thickness(0);

                purokTextbox.BorderBrush = Brushes.DarkGray;
                head_first_name_Textbox.BorderBrush = Brushes.DarkGray;
                head_middle_name_Textbox.BorderBrush = Brushes.DarkGray;
                head_last_name_Textbox.BorderBrush = Brushes.DarkGray;

                //Inserting the purok and barangay data in household table
                connection.Open();
                SqlCommand insertHouseholdData1CMD = new SqlCommand();
                insertHouseholdData1CMD.Connection = connection;
                insertHouseholdData1CMD.CommandText = "INSERT INTO household(barangay,purok) VALUES(@barangay,@purok)";
                insertHouseholdData1CMD.Parameters.AddWithValue("@barangay", barangayTextbox.Text);
                insertHouseholdData1CMD.Parameters.AddWithValue("@purok", purokTextbox.Text);
                SqlDataAdapter insertHouseholdData1DA = new SqlDataAdapter(insertHouseholdData1CMD);
                DataTable insertHouseholdData1DT = new DataTable();
                insertHouseholdData1DA.Fill(insertHouseholdData1DT);
                connection.Close();

                //Get the newest household_id
                connection.Open();
                SqlCommand getHouseholdIDCMD = new SqlCommand();
                getHouseholdIDCMD.Connection = connection;
                getHouseholdIDCMD.CommandText = "SELECT TOP 1 household_id FROM household ORDER BY household_id DESC";
                getHouseholdIDCMD.ExecuteNonQuery();

                SqlDataReader getHouseholdIDDR = getHouseholdIDCMD.ExecuteReader();
                if (getHouseholdIDDR.Read())
                {
                    household_id = getHouseholdIDDR.GetValue(0).ToString();
                    getHouseholdIDDR.Close();
                    connection.Close();
                }

                //Inserting Head Information to familyMembers Table
                connection.Open();
                SqlCommand insertHeadInformationCMD = new SqlCommand();
                insertHeadInformationCMD.Connection = connection;
                insertHeadInformationCMD.CommandText = "INSERT INTO familyMembers(family_member_household_id, full_name,first_name,middle_name,last_name, suffix, head_or_member,dependency,tribe,sex,bdate,age,religion,education,occupation,relationship,pwd,ip,philhealth,breast_feeding,ntp,smooking,fourps) VALUES(@family_member_household_id, @first_name + ' ' + @middle_name + ' ' + @last_name + ' ' + @suffix, @first_name, @middle_name, @last_name, @suffix, 'Head', 'Independent', @tribe, @sex, @bdate, @age, @religion, @education, @occupation, @relationship, @pwd, @ip, @philhealth, @breast_feeding, @ntp, @smooking, @fourps)";
                insertHeadInformationCMD.Parameters.AddWithValue("@family_member_household_id", household_id);
                insertHeadInformationCMD.Parameters.AddWithValue("@first_name", head_first_name_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@middle_name", head_middle_name_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@last_name", head_last_name_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@suffix", head_suffix_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@tribe", head_tribe_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@sex", head_sex_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@bdate", head_bdate_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@age", head_age_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@religion", head_religion_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@education", head_education_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@occupation", head_occupation_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@relationship", head_relation_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@pwd", head_pwd_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@ip", head_ip_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@philhealth", head_philhealth_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@breast_feeding", head_breast_feeding_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@ntp", head_ntp_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@smooking", head_smooking_Textbox.Text);
                insertHeadInformationCMD.Parameters.AddWithValue("@fourps", head_fourps_Textbox.Text);
                SqlDataAdapter insertHeadInformationDA = new SqlDataAdapter(insertHeadInformationCMD);
                DataTable insertHeadInformationDT = new DataTable();
                insertHeadInformationDA.Fill(insertHeadInformationDT);
                connection.Close();

                //Gathering the data in temporaryMembers Table
                SqlConnection temporaryFamilyMembers_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                temporaryFamilyMembers_connection.Open();
                SqlCommand getTemporaryMembersCMD = new SqlCommand();
                getTemporaryMembersCMD.Connection = temporaryFamilyMembers_connection;
                getTemporaryMembersCMD.CommandText = "SELECT * FROM temporaryFamilyMembers";
                getTemporaryMembersCMD.ExecuteNonQuery();

                SqlDataReader getTemporaryMembersDR = getTemporaryMembersCMD.ExecuteReader();
                while (getTemporaryMembersDR.Read())
                {
                    family_number_count++;
                    temporaryFamilyMembers_full_name = getTemporaryMembersDR.GetValue(1).ToString();
                    temporaryFamilyMembers_first_name = getTemporaryMembersDR.GetValue(2).ToString();
                    temporaryFamilyMembers_middle_name = getTemporaryMembersDR.GetValue(3).ToString();
                    temporaryFamilyMembers_last_name = getTemporaryMembersDR.GetValue(4).ToString();
                    temporaryFamilyMembers_suffix = getTemporaryMembersDR.GetValue(5).ToString();
                    temporaryFamilyMembers_head_or_member = getTemporaryMembersDR.GetValue(6).ToString();
                    temporaryFamilyMembers_dependency = getTemporaryMembersDR.GetValue(7).ToString();
                    temporaryFamilyMembers_tribe = getTemporaryMembersDR.GetValue(8).ToString();
                    temporaryFamilyMembers_sex = getTemporaryMembersDR.GetValue(9).ToString();
                    temporaryFamilyMembers_bdate = getTemporaryMembersDR.GetValue(10).ToString();
                    temporaryFamilyMembers_age = getTemporaryMembersDR.GetValue(11).ToString();
                    temporaryFamilyMembers_religion = getTemporaryMembersDR.GetValue(12).ToString();
                    temporaryFamilyMembers_education = getTemporaryMembersDR.GetValue(13).ToString();
                    temporaryFamilyMembers_occupation = getTemporaryMembersDR.GetValue(14).ToString();
                    temporaryFamilyMembers_relationship = getTemporaryMembersDR.GetValue(15).ToString();
                    temporaryFamilyMembers_pwd = getTemporaryMembersDR.GetValue(16).ToString();
                    temporaryFamilyMembers_ip = getTemporaryMembersDR.GetValue(17).ToString();
                    temporaryFamilyMembers_philhealth = getTemporaryMembersDR.GetValue(18).ToString();
                    temporaryFamilyMembers_breast_feeding = getTemporaryMembersDR.GetValue(19).ToString();
                    temporaryFamilyMembers_ntp = getTemporaryMembersDR.GetValue(20).ToString();
                    temporaryFamilyMembers_smooking = getTemporaryMembersDR.GetValue(21).ToString();
                    temporaryFamilyMembers_fourps = getTemporaryMembersDR.GetValue(22).ToString();

                    //Inserting temporaryFamilyMembers to familyMembers Table
                    connection.Open();
                    SqlCommand insertTemporaryFamilyMembersInformationCMD = new SqlCommand();
                    insertTemporaryFamilyMembersInformationCMD.Connection = connection;
                    insertTemporaryFamilyMembersInformationCMD.CommandText = "INSERT INTO familyMembers(family_member_household_id , full_name, first_name, middle_name, last_name, suffix, head_or_member, dependency, tribe, sex, bdate, age, religion, education, occupation, relationship, pwd, ip, philhealth, breast_feeding, ntp, smooking, fourps) VALUES(@family_member_household_id, @full_name,@first_name, @middle_name, @last_name, @suffix, @head_or_member, @dependency, @tribe, @sex, @bdate, @age, @religion, @education, @occupation, @relationship, @pwd, @ip, @philhealth, @breast_feeding, @ntp, @smooking, @fourps)";
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@family_member_household_id", household_id);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@full_name", temporaryFamilyMembers_full_name);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@first_name", temporaryFamilyMembers_first_name);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@middle_name", temporaryFamilyMembers_middle_name);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@last_name", temporaryFamilyMembers_last_name);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@suffix", temporaryFamilyMembers_suffix);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@head_or_member", temporaryFamilyMembers_head_or_member);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@dependency", temporaryFamilyMembers_dependency);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@tribe", temporaryFamilyMembers_tribe);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@sex", temporaryFamilyMembers_sex);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@bdate", temporaryFamilyMembers_bdate);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@age", temporaryFamilyMembers_age);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@religion", temporaryFamilyMembers_religion);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@education", temporaryFamilyMembers_education);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@occupation", temporaryFamilyMembers_occupation);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@relationship", temporaryFamilyMembers_relationship);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@pwd", temporaryFamilyMembers_pwd);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@ip", temporaryFamilyMembers_ip);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@philhealth", temporaryFamilyMembers_philhealth);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@breast_feeding", temporaryFamilyMembers_breast_feeding);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@ntp", temporaryFamilyMembers_ntp);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@smooking", temporaryFamilyMembers_smooking);
                    insertTemporaryFamilyMembersInformationCMD.Parameters.AddWithValue("@fourps", temporaryFamilyMembers_fourps);
                    SqlDataAdapter insertTemporaryFamilyMembersInformationDA = new SqlDataAdapter(insertTemporaryFamilyMembersInformationCMD);
                    DataTable insertTemporaryFamilyMembersInformationDT = new DataTable();
                    insertTemporaryFamilyMembersInformationDA.Fill(insertTemporaryFamilyMembersInformationDT);
                    connection.Close();
                }

                getTemporaryMembersDR.Close();
                temporaryFamilyMembers_connection.Close();

                //add 1 to famnum including the head
                family_number_count = family_number_count + 1;


                //Gathering the data in temporaryProducts Table
                SqlConnection temporaryProducts_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                temporaryProducts_connection.Open();
                SqlCommand getTemporaryProductsCMD = new SqlCommand();
                getTemporaryProductsCMD.Connection = temporaryProducts_connection;
                getTemporaryProductsCMD.CommandText = "SELECT * FROM temporaryProducts";
                getTemporaryProductsCMD.ExecuteNonQuery();

                SqlDataReader getgetTemporaryProductsDR = getTemporaryProductsCMD.ExecuteReader();
                while (getgetTemporaryProductsDR.Read())
                {
                    temporaryProducts_name = getgetTemporaryProductsDR.GetValue(1).ToString();


                    //Inserting temporaryProducts to farmingProducts Table
                    connection.Open();
                    SqlCommand insertTemporaryProductsInformationCMD = new SqlCommand();
                    insertTemporaryProductsInformationCMD.Connection = connection;
                    insertTemporaryProductsInformationCMD.CommandText = "INSERT INTO farmingProducts(product_household_id, product_name) VALUES(@product_household_id, @product_name)";
                    insertTemporaryProductsInformationCMD.Parameters.AddWithValue("@product_household_id", household_id);
                    insertTemporaryProductsInformationCMD.Parameters.AddWithValue("@product_name", temporaryProducts_name);
                    SqlDataAdapter insertTemporaryProductsInformationDA = new SqlDataAdapter(insertTemporaryProductsInformationCMD);
                    DataTable insertTemporaryProductsInformationDT = new DataTable();
                    insertTemporaryProductsInformationDA.Fill(insertTemporaryProductsInformationDT);
                    connection.Close();
                }

                getgetTemporaryProductsDR.Close();
                temporaryProducts_connection.Close();


                //Inserting Household Information to household Table
                connection.Open();
                SqlCommand insertHouseholdInformationCMD = new SqlCommand();
                insertHouseholdInformationCMD.Connection = connection;
                insertHouseholdInformationCMD.CommandText = "UPDATE household SET family_number=@family_number, mother_tongue=@mother_tongue, house_type=@house_type, sanitary_toilet=@sanitary_toilet, immunization=@immunization, wra=@wra, " +
                    "garbage_disposal=@garbage_disposal, water_source=@water_source, family_planning=@family_planning, background_gardening=@background_gardening, livelihood_status=@livelihood_status, animals=@animals, " +
                    "blind_drainage=@blind_drainage, communication=@communication, homelot_status=@homelot_status, energy_source=@energy_source, direct_waste_to_water_bodies=@dwtwb, vulnerable_status=@vulnerable_status, agricultural_facilities=@agricultural_facility, " +
                    "other_source_of_income=@other_source_of_income, house_status=@house_status, transportation=@transportation WHERE household_id = @household_id";
                insertHouseholdInformationCMD.Parameters.AddWithValue("@household_id", household_id);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@family_number", family_number_count);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@mother_tongue", household_mother_tongue_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@house_type", household_house_type_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@sanitary_toilet", household_sanitary_toilet_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@immunization", household_immunization_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@wra", household_wra_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@garbage_disposal", household_garbage_disposal_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@water_source", household_water_source_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@family_planning", household_family_planning_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@background_gardening", household_background_gardening_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@livelihood_status", household_livelihood_status_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@animals", household_animals_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@blind_drainage", household_blind_drainage_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@communication", household_communication_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@homelot_status", household_homelot_status_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@energy_source", household_energy_source_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@dwtwb", household_dwtwb_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@vulnerable_status", household_vulnerable_status_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@agricultural_facility", household_agricultural_facility_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@other_source_of_income", household_other_source_of_income_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@house_status", household_house_status_textbox.Text);
                insertHouseholdInformationCMD.Parameters.AddWithValue("@transportation", household_transportation_textbox.Text);
                SqlDataAdapter insertHouseholdInformationDA = new SqlDataAdapter(insertHouseholdInformationCMD);
                DataTable insertHouseholdInformationDT = new DataTable();
                insertHouseholdInformationDA.Fill(insertHouseholdInformationDT);
                connection.Close();

                family_number_count = 0;

                connection.Open();
                SqlCommand deleteAllTemporaryMemberSubmittedCMD = new SqlCommand();
                deleteAllTemporaryMemberSubmittedCMD.Connection = connection;
                deleteAllTemporaryMemberSubmittedCMD.CommandText = "DELETE FROM temporaryFamilyMembers";
                SqlDataAdapter deleteAllTemporaryMemberSubmittedDA = new SqlDataAdapter(deleteAllTemporaryMemberSubmittedCMD);
                DataTable deleteAllTemporaryMemberSubmittedDT = new DataTable();
                deleteAllTemporaryMemberSubmittedDA.Fill(deleteAllTemporaryMemberSubmittedDT);
                connection.Close();

                connection.Open();
                SqlCommand deleteAllTemporaryProductsSubmittedCMD = new SqlCommand();
                deleteAllTemporaryProductsSubmittedCMD.Connection = connection;
                deleteAllTemporaryProductsSubmittedCMD.CommandText = "DELETE FROM temporaryProducts";
                SqlDataAdapter deleteAllTemporaryProductsSubmittedDA = new SqlDataAdapter(deleteAllTemporaryProductsSubmittedCMD);
                DataTable deleteAllTemporaryProductsSubmittedDT = new DataTable();
                deleteAllTemporaryProductsSubmittedDA.Fill(deleteAllTemporaryProductsSubmittedDT);
                connection.Close();


                connection.Open();
                string refreshTemporaryFamilyMembersSubmitted = "SELECT * FROM temporaryFamilyMembers";
                SqlCommand refreshTemporaryFamilyMembersSubmittedCMD = new SqlCommand(refreshTemporaryFamilyMembersSubmitted, connection);
                refreshTemporaryFamilyMembersSubmittedCMD.ExecuteNonQuery();
                SqlDataAdapter refreshTemporaryFamilyMembersSubmittedDA = new SqlDataAdapter(refreshTemporaryFamilyMembersSubmittedCMD);
                DataTable refreshTemporaryFamilyMembersSubmittedDT = new DataTable("temporaryFamilyMembers");
                refreshTemporaryFamilyMembersSubmittedDA.Fill(refreshTemporaryFamilyMembersSubmittedDT);
                member_dataGrid.ItemsSource = refreshTemporaryFamilyMembersSubmittedDT.DefaultView;
                refreshTemporaryFamilyMembersSubmittedDA.Update(refreshTemporaryFamilyMembersSubmittedDT);
                connection.Close();

                connection.Open();
                string refreshTemporaryProductSubmitted = "SELECT * FROM temporaryProducts";
                SqlCommand refreshTemporaryProductSubmittedCMD = new SqlCommand(refreshTemporaryProductSubmitted, connection);
                refreshTemporaryProductSubmittedCMD.ExecuteNonQuery();
                SqlDataAdapter refreshTemporaryProductSubmittedDA = new SqlDataAdapter(refreshTemporaryProductSubmittedCMD);
                DataTable refreshTemporaryProductSubmittedDT = new DataTable("temporaryProducts");
                refreshTemporaryProductSubmittedDA.Fill(refreshTemporaryProductSubmittedDT);
                product_dataGrid.ItemsSource = refreshTemporaryProductSubmittedDT.DefaultView;
                refreshTemporaryProductSubmittedDA.Update(refreshTemporaryProductSubmittedDT);
                connection.Close();

                empty_member_dataGrid.Visibility = Visibility.Visible;
                member_dataGrid.Visibility = Visibility.Hidden;

                empty_product_dataGrid.Visibility = Visibility.Visible;
                product_dataGrid.Visibility = Visibility.Hidden;

                purokTextbox.Text = "";

                head_first_name_Textbox.Text = "";
                head_middle_name_Textbox.Text = "";
                head_last_name_Textbox.Text = "";
                head_tribe_Textbox.Text = "";
                head_sex_Textbox.Text = "";
                head_bdate_Textbox.Text = "";
                head_age_Textbox.Text = "";
                head_religion_Textbox.Text = "";
                head_education_Textbox.Text = "";
                head_occupation_Textbox.Text = "";
                head_relation_Textbox.Text = "";
                head_pwd_Textbox.Text = "";
                head_ip_Textbox.Text = "";
                head_philhealth_Textbox.Text = "";
                head_breast_feeding_Textbox.Text = "";
                head_ntp_Textbox.Text = "";
                head_smooking_Textbox.Text = "";
                head_fourps_Textbox.Text = "";

                household_mother_tongue_textbox.Text = "";
                household_house_type_textbox.Text = "";
                household_sanitary_toilet_textbox.Text = "";
                household_immunization_textbox.Text = "";
                household_wra_textbox.Text = "";
                household_garbage_disposal_textbox.Text = "";
                household_water_source_textbox.Text = "";
                household_family_planning_textbox.Text = "";
                household_background_gardening_textbox.Text = "";
                household_livelihood_status_textbox.Text = "";
                household_animals_textbox.Text = "";
                household_blind_drainage_textbox.Text = "";
                household_communication_textbox.Text = "";
                household_homelot_status_textbox.Text = "";
                household_energy_source_textbox.Text = "";
                household_dwtwb_textbox.Text = "";
                household_vulnerable_status_textbox.Text = "";
                household_agricultural_facility_textbox.Text = "";
                household_other_source_of_income_textbox.Text = "";
                household_house_status_textbox.Text = "";
                household_transportation_textbox.Text = "";

                MessageBox.Show("Informations had been Successfully Encoded!");

                purokTextbox.Focus();


            }
        }
    }
}
