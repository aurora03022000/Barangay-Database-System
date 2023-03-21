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
    /// Interaction logic for searchDataPage1.xaml
    /// </summary>
    public partial class searchDataPage1 : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String memberAge1, memberAge2 , nextAge, famnum, updatedFamnum, memberID1, memberID2, memberIDNext;      

        int memberAge1Integer, memberAge2Integer, nextAgeInteger, famnumInteger, updatedFamnumInteger, memberID1Integer, memberID2Integer, memberIDNextInteger, memberIDNewHead;
        int counterAgeCompare = 0;
        int nextHead;

        int purokCount = 0;
        int totalPurokCount = 0;

        String barangay, purok;

        String selected;

        String nextHeadString;

        String famnumValue;

        int famnumValueInteger;

        bool isWindowOpen;

        public searchDataPage1()
        {
            InitializeComponent();
            purokCount = 0;
            totalPurokCount = 0;

            MaxHeight = SystemParameters.MaximizedPrimaryScreenHeight;
            MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

            connection.Open();
            string displayAllData = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id ORDER BY family_member_household_id";
            SqlCommand displayAllDataCMD = new SqlCommand(displayAllData, connection);
            displayAllDataCMD.ExecuteNonQuery();
            SqlDataAdapter displayAllDataDA = new SqlDataAdapter(displayAllDataCMD);
            DataTable displayAllDataDT = new DataTable("familyMembers");
            displayAllDataDA.Fill(displayAllDataDT);
            search_dataGrid.ItemsSource = displayAllDataDT.DefaultView;
            displayAllDataDA.Update(displayAllDataDT);
            connection.Close();

            category_combobox.Text = "Purok";

            //count puroks total
            SqlConnection countPuroksTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
            countPuroksTotal_connection.Open();
            SqlCommand countPuroksTotalCMD = new SqlCommand();
            countPuroksTotalCMD.Connection = countPuroksTotal_connection;
            countPuroksTotalCMD.CommandText = "SELECT * FROM familyMembers";
            countPuroksTotalCMD.ExecuteNonQuery();

            SqlDataReader countPuroksTotalDR = countPuroksTotalCMD.ExecuteReader();
            while (countPuroksTotalDR.Read())
            {
                totalPurokCount++;
            }
            countPuroksTotalDR.Close();
            countPuroksTotal_connection.Close();

            statistics.Content = "Total Number of Person: " + totalPurokCount;

            //udpate selected item to view
            connection.Open();
            SqlCommand updateSelectedFamilyMemberViewIDDefaultCMD = new SqlCommand();
            updateSelectedFamilyMemberViewIDDefaultCMD.Connection = connection;
            updateSelectedFamilyMemberViewIDDefaultCMD.CommandText = "UPDATE selectedFamilyMember SET selectedFamilyMember_id_value = '' WHERE selectedFamilyMember_id = 1";
            SqlDataAdapter updateSelectedFamilyMemberViewIDDefaultDA = new SqlDataAdapter(updateSelectedFamilyMemberViewIDDefaultCMD);
            DataTable updateSelectedFamilyMemberViewIDDefaultDT = new DataTable();
            updateSelectedFamilyMemberViewIDDefaultDA.Fill(updateSelectedFamilyMemberViewIDDefaultDT);
            connection.Close();
        }

        private void delete_member_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedRow = search_dataGrid.SelectedItem as DataRowView;
            string selectedRow_member_id = getSelectedRow.Row[0].ToString();
            string selectedRow_household_id = getSelectedRow.Row[1].ToString();
            string selectedRow_head_or_member = getSelectedRow.Row[7].ToString();

            if(selectedRow_head_or_member == "Head")
            {
                MessageBoxResult result = MessageBox.Show("Do you want to delete this Household?", "Confirmation", MessageBoxButton.YesNoCancel);

                switch (result)
                {
                    case MessageBoxResult.Yes:
                        //deleting Head of the Family
                        connection.Open();
                        SqlCommand deleteAllMemberCMD = new SqlCommand();
                        deleteAllMemberCMD.Connection = connection;
                        deleteAllMemberCMD.CommandText = "DELETE FROM familyMembers WHERE family_member_household_id=@householdID";
                        deleteAllMemberCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                        SqlDataAdapter deleteAllMemberDA = new SqlDataAdapter(deleteAllMemberCMD);
                        DataTable deleteAllMemberDT = new DataTable();
                        deleteAllMemberDA.Fill(deleteAllMemberDT);
                        connection.Close();

                        //deleting product of household
                        connection.Open();
                        SqlCommand deleteAllProductCMD = new SqlCommand();
                        deleteAllProductCMD.Connection = connection;
                        deleteAllProductCMD.CommandText = "DELETE FROM farmingProducts WHERE product_household_id=@productHouseholdID";
                        deleteAllProductCMD.Parameters.AddWithValue("@productHouseholdID", selectedRow_household_id);
                        SqlDataAdapter deleteAllProductDA = new SqlDataAdapter(deleteAllProductCMD);
                        DataTable deleteAllProductDT = new DataTable();
                        deleteAllProductDA.Fill(deleteAllProductDT);
                        connection.Close();

                        connection.Open();
                        SqlCommand deleteHouseholdCMD = new SqlCommand();
                        deleteHouseholdCMD.Connection = connection;
                        deleteHouseholdCMD.CommandText = "DELETE FROM household WHERE household_id=@householdID";
                        deleteHouseholdCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                        SqlDataAdapter deleteHouseholdDA = new SqlDataAdapter(deleteHouseholdCMD);
                        DataTable deleteHouseholdDT = new DataTable();
                        deleteHouseholdDA.Fill(deleteHouseholdDT);
                        connection.Close();

                        MessageBox.Show("Household had been deleted Successfully");

                        break;

                    case MessageBoxResult.No:
                        MessageBoxResult result1 = MessageBox.Show("Do you want to delete this Member?", "Confirmation", MessageBoxButton.YesNo);

                        switch (result1)
                        {
                            case MessageBoxResult.Yes:
                                //deleting Head of the Family
                                connection.Open();
                                SqlCommand deleteHeadMemberCMD = new SqlCommand();
                                deleteHeadMemberCMD.Connection = connection;
                                deleteHeadMemberCMD.CommandText = "DELETE FROM familyMembers WHERE family_member_id=@headMemberID";
                                deleteHeadMemberCMD.Parameters.AddWithValue("@headMemberID", selectedRow_member_id);
                                SqlDataAdapter deleteHeadMemberDA = new SqlDataAdapter(deleteHeadMemberCMD);
                                DataTable deleteHeadMemberDT = new DataTable();
                                deleteHeadMemberDA.Fill(deleteHeadMemberDT);
                                connection.Close();

                                //getting how many members
                                SqlConnection getHowManyMembers_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                                getHowManyMembers_connection.Open();
                                SqlCommand getFamnumCMD = new SqlCommand();
                                getFamnumCMD.Connection = getHowManyMembers_connection;
                                getFamnumCMD.CommandText = "SELECT * FROM household WHERE household_id = @householdID";
                                getFamnumCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                                getFamnumCMD.ExecuteNonQuery();

                                SqlDataReader getFamnumDR = getFamnumCMD.ExecuteReader();
                                while (getFamnumDR.Read())
                                {
                                    famnum = getFamnumDR.GetValue(3).ToString();
                                    famnumInteger = Int32.Parse(famnum);
                                    famnumInteger = famnumInteger - 1;
                                }
                                getFamnumDR.Close();
                                getHowManyMembers_connection.Close();

                                //updating family number
                                connection.Open();
                                SqlCommand updateFamilyNumberCMD = new SqlCommand();
                                updateFamilyNumberCMD.Connection = connection;
                                updateFamilyNumberCMD.CommandText = "UPDATE household SET family_number = @newFamilyNumber WHERE household_id=@householdID";
                                updateFamilyNumberCMD.Parameters.AddWithValue("@newFamilyNumber", famnumInteger);
                                updateFamilyNumberCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                                SqlDataAdapter updateFamilyNumberDA = new SqlDataAdapter(updateFamilyNumberCMD);
                                DataTable updateFamilyNumberDT = new DataTable();
                                updateFamilyNumberDA.Fill(updateFamilyNumberDT);
                                connection.Close();

                                //getting update family member number
                                SqlConnection getUpdatedFamnum_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                                getUpdatedFamnum_connection.Open();
                                SqlCommand getUpdatedFamnumCMD = new SqlCommand();
                                getUpdatedFamnumCMD.Connection = getUpdatedFamnum_connection;
                                getUpdatedFamnumCMD.CommandText = "SELECT * FROM household WHERE household_id = @householdID";
                                getUpdatedFamnumCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                                getUpdatedFamnumCMD.ExecuteNonQuery();

                                SqlDataReader getUpdatedFamnumDR = getUpdatedFamnumCMD.ExecuteReader();
                                while (getUpdatedFamnumDR.Read())
                                {
                                    updatedFamnum = getUpdatedFamnumDR.GetValue(3).ToString();
                                    updatedFamnumInteger = Int32.Parse(updatedFamnum);
                                }
                                getUpdatedFamnumDR.Close();
                                getUpdatedFamnum_connection.Close();

                                //execute if not empty member
                                if (updatedFamnumInteger > 0)
                                {
                                    //check if how many left member
                                    if (updatedFamnumInteger == 1)
                                    {
                                        //setting new head
                                        connection.Open();
                                        SqlCommand updateNewHeadCMD = new SqlCommand();
                                        updateNewHeadCMD.Connection = connection;
                                        updateNewHeadCMD.CommandText = "UPDATE familyMembers SET head_or_member = 'Head' WHERE family_member_household_id=@householdID";
                                        updateNewHeadCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                                        SqlDataAdapter updateNewHeadDA = new SqlDataAdapter(updateNewHeadCMD);
                                        DataTable updateNewHeadDT = new DataTable();
                                        updateNewHeadDA.Fill(updateNewHeadDT);
                                        connection.Close();
                                    }

                                    else
                                    {
                                        //Getting the highest age to be the next head
                                        SqlConnection getMembersAge_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                                        getMembersAge_connection.Open();
                                        SqlCommand getMembersAgeCMD = new SqlCommand();
                                        getMembersAgeCMD.Connection = getMembersAge_connection;
                                        getMembersAgeCMD.CommandText = "SELECT * FROM familyMembers WHERE family_member_household_id = @householdID";
                                        getMembersAgeCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                                        getMembersAgeCMD.ExecuteNonQuery();

                                        SqlDataReader getMembersAgeDR = getMembersAgeCMD.ExecuteReader();
                                        while (getMembersAgeDR.Read())
                                        {

                                            counterAgeCompare++;

                                            if (counterAgeCompare == 1)
                                            {
                                                memberAge1 = getMembersAgeDR.GetValue(11).ToString();
                                                memberAge1Integer = Int32.Parse(memberAge1);
                                                memberID1 = getMembersAgeDR.GetValue(0).ToString();
                                                memberID1Integer = Int32.Parse(memberID1);
                                            }

                                            if (counterAgeCompare == 2)
                                            {
                                                memberAge2 = getMembersAgeDR.GetValue(11).ToString();
                                                memberAge2Integer = Int32.Parse(memberAge2);
                                                memberID2 = getMembersAgeDR.GetValue(0).ToString();
                                                memberID2Integer = Int32.Parse(memberID2);

                                                if (memberAge1Integer > memberAge2Integer)
                                                {
                                                    nextHead = memberAge1Integer;
                                                    memberIDNewHead = memberID1Integer;
                                                }

                                                else if (memberAge1Integer < memberAge2Integer)
                                                {
                                                    nextHead = memberAge2Integer;
                                                    memberIDNewHead = memberID2Integer;
                                                }

                                                else if (memberAge1Integer == memberAge2Integer)
                                                {
                                                    nextHead = memberAge1Integer;
                                                    memberIDNewHead = memberID1Integer;
                                                }
                                            }

                                            else
                                            {
                                                nextAge = getMembersAgeDR.GetValue(11).ToString();
                                                nextAgeInteger = Int32.Parse(nextAge);
                                                memberIDNext = getMembersAgeDR.GetValue(0).ToString();
                                                memberIDNextInteger = Int32.Parse(memberIDNext);

                                                if (nextAgeInteger > nextHead)
                                                {
                                                    nextHead = nextAgeInteger;
                                                    memberIDNewHead = memberIDNextInteger;
                                                }
                                            }
                                        }
                                        getMembersAgeDR.Close();
                                        getMembersAge_connection.Close();

                                        counterAgeCompare = 0;
                                        nextHeadString = nextHead.ToString();


                                        //setting new head
                                        connection.Open();
                                        SqlCommand updateNewHeadRoleCMD = new SqlCommand();
                                        updateNewHeadRoleCMD.Connection = connection;
                                        updateNewHeadRoleCMD.CommandText = "UPDATE familyMembers SET head_or_member = 'Head' WHERE family_member_id=@memberID";
                                        updateNewHeadRoleCMD.Parameters.AddWithValue("@memberID", memberIDNewHead);
                                        SqlDataAdapter updateNewHeadDA = new SqlDataAdapter(updateNewHeadRoleCMD);
                                        DataTable updateNewHeadDT = new DataTable();
                                        updateNewHeadDA.Fill(updateNewHeadDT);
                                        connection.Close();
                                        MessageBox.Show("Member had been deleted Successfully");
                                    }

                                }

                                if (updatedFamnumInteger == 0)
                                {
                                    //deleting Head of the Family
                                    connection.Open();
                                    SqlCommand deleteWholeHouseHoldCMD = new SqlCommand();
                                    deleteWholeHouseHoldCMD.Connection = connection;
                                    deleteWholeHouseHoldCMD.CommandText = "DELETE FROM household WHERE household_id=@householdID";
                                    deleteWholeHouseHoldCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                                    SqlDataAdapter deleteWholeHouseHoldDA = new SqlDataAdapter(deleteWholeHouseHoldCMD);
                                    DataTable deleteWholeHouseHoldDT = new DataTable();
                                    deleteWholeHouseHoldDA.Fill(deleteWholeHouseHoldDT);
                                    connection.Close();

                                    MessageBox.Show("Household had been deleted Successfully");

                                }
                                break;

                            case MessageBoxResult.No:
                                break;
                        }
                        break;

                    case MessageBoxResult.Cancel:
                        break;
                }

                        

                connection.Open();
                string updateDataList = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE head_or_member = 'Head' ORDER BY family_member_household_id";
                SqlCommand updateDataListCMD = new SqlCommand(updateDataList, connection);
                updateDataListCMD.ExecuteNonQuery();
                SqlDataAdapter updateDataListDA = new SqlDataAdapter(updateDataListCMD);
                DataTable updateDataListDT = new DataTable("familyMembers");
                updateDataListDA.Fill(updateDataListDT);
                search_dataGrid.ItemsSource = updateDataListDT.DefaultView;
                updateDataListDA.Update(updateDataListDT);
                connection.Close();
            }


   
      
            else
            {
                MessageBoxResult resultMember = MessageBox.Show("Do you want to delete this Member?", "Confirmation", MessageBoxButton.YesNo);

                switch (resultMember)
                {
                    case MessageBoxResult.Yes:
                        connection.Open();
                        SqlCommand deleteMemberCMD = new SqlCommand();
                        deleteMemberCMD.Connection = connection;
                        deleteMemberCMD.CommandText = "DELETE FROM familyMembers WHERE family_member_id=@memberID";
                        deleteMemberCMD.Parameters.AddWithValue("@memberID", selectedRow_member_id);
                        SqlDataAdapter deleteMemberDA = new SqlDataAdapter(deleteMemberCMD);
                        DataTable deleteMemberDT = new DataTable();
                        deleteMemberDA.Fill(deleteMemberDT);
                        connection.Close();

                        //getting famnum Value
                        SqlConnection getHouseholdFamnumConnection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                        getHouseholdFamnumConnection.Open();
                        SqlCommand getHouseholdFamnumCMD = new SqlCommand();
                        getHouseholdFamnumCMD.Connection = getHouseholdFamnumConnection;
                        getHouseholdFamnumCMD.CommandText = "SELECT family_number FROM household WHERE household_id = @householdID";
                        getHouseholdFamnumCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
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
                        updateFamnumCMD.Parameters.AddWithValue("@householdID", selectedRow_household_id);
                        updateFamnumCMD.Parameters.AddWithValue("@newFamnum", famnumValueInteger);
                        SqlDataAdapter updateFamnumDA = new SqlDataAdapter(updateFamnumCMD);
                        DataTable updateFamnumDT = new DataTable();
                        updateFamnumDA.Fill(updateFamnumDT);
                        connection.Close();

                        MessageBox.Show("Member had been deleted Successfully");

                        break;

                    case MessageBoxResult.No:
                        break;
                }
                
                connection.Open();
                string updateDataList1 = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE head_or_member = 'Head' ORDER BY family_member_household_id";
                SqlCommand updateDataList1CMD = new SqlCommand(updateDataList1, connection);
                updateDataList1CMD.ExecuteNonQuery();
                SqlDataAdapter updateDataList1DA = new SqlDataAdapter(updateDataList1CMD);
                DataTable updateDataList1DT = new DataTable("familyMembers");
                updateDataList1DA.Fill(updateDataList1DT);
                search_dataGrid.ItemsSource = updateDataList1DT.DefaultView;
                updateDataList1DA.Update(updateDataList1DT);
                connection.Close();
            }   
        }

        private void view_member_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedRow1 = search_dataGrid.SelectedItem as DataRowView;
            string selectedRow_member_id_view = getSelectedRow1.Row[0].ToString();

            //udpate selected item to view
            connection.Open();
            SqlCommand updateSelectedFamilyMemberViewIDCMD = new SqlCommand();
            updateSelectedFamilyMemberViewIDCMD.Connection = connection;
            updateSelectedFamilyMemberViewIDCMD.CommandText = "UPDATE selectedFamilyMember SET selectedFamilyMember_id_value = @viewID WHERE selectedFamilyMember_id = 1";
            updateSelectedFamilyMemberViewIDCMD.Parameters.AddWithValue("@viewID", selectedRow_member_id_view);
            SqlDataAdapter updateSelectedFamilyMemberViewIDDA = new SqlDataAdapter(updateSelectedFamilyMemberViewIDCMD);
            DataTable updateSelectedFamilyMemberViewIDDT = new DataTable();
            updateSelectedFamilyMemberViewIDDA.Fill(updateSelectedFamilyMemberViewIDDT);
            connection.Close();


            foreach (Window viewDataWindow in Application.Current.Windows)
            {
                if (viewDataWindow is viewDataPage)
                {
                    isWindowOpen = true;
                    viewDataWindow.Close();

                    viewDataPage viewDataWindow1 = new viewDataPage();
                    viewDataWindow1.Show();

                }
            }

            if (!isWindowOpen)
            {

                viewDataPage viewDataWindow2 = new viewDataPage();
                viewDataWindow2.Show();
            }

            else if (isWindowOpen == true)
            {
                isWindowOpen = false;
            }
        }

        private void number_textbox(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void Category_combobox_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {

            selected = (((sender as ComboBox).SelectedValue) as ComboBoxItem).Content.ToString();

            switch (selected)
            {
                case "Purok":
                    search_combobox.Items.Clear();

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
                        search_combobox.Items.Add(purok);
                    }
                    getPurokListDR.Close();
                    getPurokListConnection.Close();

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;
                    
                case "Full Name":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "First Name":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Middle Name":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Last Name":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "4Ps":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Age":
                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Visible;
                    search_textbox_date.Visibility = Visibility.Hidden;

                    break;

                case "Agricultural Facility":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Animals/Pet":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Background Gardening":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Birth Date":
                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Visible;
                    break;

                case "Blind Drainage":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Breast Feeding":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Communication":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Dependency":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Dependent");
                    search_combobox.Items.Add("Independent");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Direct Waste to Water Bodies":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Energy Source":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Family Planning":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Farming Product":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Garbage Disposal":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Highest Educational Attainment":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Not Attended");
                    search_combobox.Items.Add("ALS");
                    search_combobox.Items.Add("Elementary Level");
                    search_combobox.Items.Add("Elementary Graduate");
                    search_combobox.Items.Add("High School Level");
                    search_combobox.Items.Add("High School Graduate");
                    search_combobox.Items.Add("Senior High School Level");
                    search_combobox.Items.Add("Senior High School Graduate");
                    search_combobox.Items.Add("College Level");
                    search_combobox.Items.Add("Collehe Graduate");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Homelot Status":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "House Status":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "House Type":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Immunization":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "IP":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Livelihood Status":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Mother Tongue":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "NTP":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Number of Family Members":
                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Visible;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Occupation":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Other Source of Income":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Philhealth":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "PWD":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Relation to Head of the Family":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Religion":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Sanitary Toilet":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Sex":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Male");
                    search_combobox.Items.Add("Female");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Smooking":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Suffix":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Jr.");
                    search_combobox.Items.Add("Sr.");
                    search_combobox.Items.Add("I");
                    search_combobox.Items.Add("II");
                    search_combobox.Items.Add("III");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Transportation":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Tribe":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Vulnerable Status":
                    search_textbox.Visibility = Visibility.Visible;
                    search_border.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "Water Source":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;

                case "WRA":
                    search_combobox.Items.Clear();
                    search_combobox.Items.Add("Yes");
                    search_combobox.Items.Add("No");
                    search_combobox.Items.Add("N/A");

                    search_textbox.Visibility = Visibility.Hidden;
                    search_border.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    search_textbox_date.Visibility = Visibility.Hidden;
                    break;


                default:
                    break;
            }
        }


        private void Search_btn_Click(object sender, RoutedEventArgs e)
        {
            String category_combobox_value = category_combobox.Text;
            String search_combobox_value = search_combobox.Text;
            String search_textbox_value = search_textbox.Text;
            String search_textbox_number_value = search_textbox_number.Text;
            String search_textbox_date_value = search_textbox_date.Text;

            switch (category_combobox_value)
            {
                case "Purok":
                    purokCount = 0;
                    totalPurokCount = 0;

                    for(var comboboxColumn = 6; comboboxColumn < 45 ; comboboxColumn++)
                    {
                        search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                    }

                    connection.Open();
                    string refreshDatagridPurok = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE purok=@purok";
                    SqlCommand refreshDatagridPurokCMD = new SqlCommand(refreshDatagridPurok, connection);
                    refreshDatagridPurokCMD.Parameters.AddWithValue("@purok", search_combobox_value);
                    refreshDatagridPurokCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridPurokDA = new SqlDataAdapter(refreshDatagridPurokCMD);
                    DataTable refreshDatagridPurokDT = new DataTable("familyMembers");
                    refreshDatagridPurokDA.Fill(refreshDatagridPurokDT);
                    search_dataGrid.ItemsSource = refreshDatagridPurokDT.DefaultView;
                    refreshDatagridPurokDA.Update(refreshDatagridPurokDT);
                    connection.Close();

                    //count puroks total
                    SqlConnection countPuroksTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countPuroksTotal_connection.Open();
                    SqlCommand countPuroksTotalCMD = new SqlCommand();
                    countPuroksTotalCMD.Connection = countPuroksTotal_connection;
                    countPuroksTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countPuroksTotalCMD.ExecuteNonQuery();

                    SqlDataReader countPuroksTotalDR = countPuroksTotalCMD.ExecuteReader();
                    while (countPuroksTotalDR.Read())
                    {
                        totalPurokCount++;
                    }
                    countPuroksTotalDR.Close();
                    countPuroksTotal_connection.Close();


                    //count puroks
                    SqlConnection countPuroks_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countPuroks_connection.Open();
                    SqlCommand countPuroksCMD = new SqlCommand();
                    countPuroksCMD.Connection = countPuroks_connection;
                    countPuroksCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE purok=@purok";
                    countPuroksCMD.Parameters.AddWithValue("@purok", search_combobox_value);
                    countPuroksCMD.ExecuteNonQuery();

                    SqlDataReader countPuroksDR = countPuroksCMD.ExecuteReader();
                    while (countPuroksDR.Read())
                    {
                        purokCount++;
                    }
                    countPuroksDR.Close();
                    countPuroks_connection.Close();

                    double partial = purokCount * 100;
                    double total = partial / totalPurokCount;
                    total = Convert.ToDouble(String.Format("{0:0.00}", total));
                    
                    statistics.Content = "Category: Purok" + "          " + "Purok: " + search_combobox_value + "          " + "Total Matched Results: " + purokCount + "          " + "Total Number of Person: " + totalPurokCount + "          " + "Total Percentage of Matched Results: " + total + "%";
                    break;

                case "Full Name":
                    int fnameCount = 0;
                    int totalfullnamecount = 0;

                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                    }

                    connection.Open();
                    string refreshDatagridFullname = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE full_name LIKE '%' + @fullName + '%'";
                    SqlCommand refreshDatagridFullnameCMD = new SqlCommand(refreshDatagridFullname, connection);
                    refreshDatagridFullnameCMD.Parameters.AddWithValue("@fullName", search_textbox_value);
                    refreshDatagridFullnameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridFullnameDA = new SqlDataAdapter(refreshDatagridFullnameCMD);
                    DataTable refreshDatagridFullnameDT = new DataTable("familyMembers");
                    refreshDatagridFullnameDA.Fill(refreshDatagridFullnameDT);
                    search_dataGrid.ItemsSource = refreshDatagridFullnameDT.DefaultView;
                    refreshDatagridFullnameDA.Update(refreshDatagridFullnameDT);
                    connection.Close();

                    //count fullname total
                    SqlConnection countFullnameTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countFullnameTotal_connection.Open();
                    SqlCommand countFullnameTotalCMD = new SqlCommand();
                    countFullnameTotalCMD.Connection = countFullnameTotal_connection;
                    countFullnameTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countFullnameTotalCMD.ExecuteNonQuery();

                    SqlDataReader countFullnameTotalDR = countFullnameTotalCMD.ExecuteReader();
                    while (countFullnameTotalDR.Read())
                    {
                        totalfullnamecount++;
                    }
                    countFullnameTotalDR.Close();
                    countFullnameTotal_connection.Close();

                    //count fullname
                    SqlConnection countfullname_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countfullname_connection.Open();
                    SqlCommand countfullnameCMD = new SqlCommand();
                    countfullnameCMD.Connection = countfullname_connection;
                    countfullnameCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE full_name LIKE '%' + @fullName + '%'";
                    countfullnameCMD.Parameters.AddWithValue("@fullName", search_textbox_value);
                    countfullnameCMD.ExecuteNonQuery();

                    SqlDataReader countfullnameDR = countfullnameCMD.ExecuteReader();
                    while (countfullnameDR.Read())
                    {
                        fnameCount++;
                    }
                    countfullnameDR.Close();
                    countfullname_connection.Close();

                    double partialfullname = fnameCount * 100;
                    double totalfullname = partialfullname / totalfullnamecount;
                    totalfullname = Convert.ToDouble(String.Format("{0:0.00}", totalfullname));

                    statistics.Content = "Category: Full Name" + "          " + "Full Name: " + search_textbox_value + "          " + "Total Matched Results: " + fnameCount + "          " + "Total Number of Person: " + totalfullnamecount + "          " + "Total Percentage of Matched Results: " + totalfullname + "%";
                    break;

                case "First Name":
                    int firstnameCount = 0;
                    int firstnametotalcount = 0;

                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                    }

                    connection.Open();
                    string refreshDatagridFirstname = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE first_name LIKE '%' + @firstName + '%'";
                    SqlCommand refreshDatagridFirstnameCMD = new SqlCommand(refreshDatagridFirstname, connection);
                    refreshDatagridFirstnameCMD.Parameters.AddWithValue("@firstName", search_textbox_value);
                    refreshDatagridFirstnameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridFirstnameDA = new SqlDataAdapter(refreshDatagridFirstnameCMD);
                    DataTable refreshDatagridFirstnameDT = new DataTable("familyMembers");
                    refreshDatagridFirstnameDA.Fill(refreshDatagridFirstnameDT);
                    search_dataGrid.ItemsSource = refreshDatagridFirstnameDT.DefaultView;
                    refreshDatagridFirstnameDA.Update(refreshDatagridFirstnameDT);
                    connection.Close();

                    //count firstname total
                    SqlConnection countFirstNameTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countFirstNameTotal_connection.Open();
                    SqlCommand countFirstNameTotalCMD = new SqlCommand();
                    countFirstNameTotalCMD.Connection = countFirstNameTotal_connection;
                    countFirstNameTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countFirstNameTotalCMD.ExecuteNonQuery();

                    SqlDataReader countFirstNameTotalDR = countFirstNameTotalCMD.ExecuteReader();
                    while (countFirstNameTotalDR.Read())
                    {
                        firstnametotalcount++;
                    }
                    countFirstNameTotalDR.Close();
                    countFirstNameTotal_connection.Close();

                    //count fname
                    SqlConnection countFirstname_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countFirstname_connection.Open();
                    SqlCommand countFirstnameCMD = new SqlCommand();
                    countFirstnameCMD.Connection = countFirstname_connection;
                    countFirstnameCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE first_name LIKE '%' + @firstname + '%'";
                    countFirstnameCMD.Parameters.AddWithValue("@firstname", search_textbox_value);
                    countFirstnameCMD.ExecuteNonQuery();

                    SqlDataReader countFirstnameDR = countFirstnameCMD.ExecuteReader();
                    while (countFirstnameDR.Read())
                    {
                        firstnameCount++;
                    }
                    countFirstnameDR.Close();
                    countFirstname_connection.Close();

                    double partialfirstname = firstnameCount * 100;
                    double totalfirstname = partialfirstname / firstnametotalcount;
                    totalfirstname = Convert.ToDouble(String.Format("{0:0.00}", totalfirstname));

                    statistics.Content = "Category: First Name" + "          " + "First Name: " + search_textbox_value + "          " + "Total Matched Results: " + firstnameCount + "          " + "Total Number of Person: " + firstnametotalcount + "          " + "Total Percentage of Matched Results: " + totalfirstname +"%";
                    break;

                case "Middle Name":
                    int middlenameCount = 0;
                    int middlenameTotalCount = 0;

                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                    }

                    connection.Open();
                    string refreshDatagridMiddlename = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE middle_name LIKE '%' + @middleName + '%'";
                    SqlCommand refreshDatagridMiddlenameCMD = new SqlCommand(refreshDatagridMiddlename, connection);
                    refreshDatagridMiddlenameCMD.Parameters.AddWithValue("@middleName", search_textbox_value);
                    refreshDatagridMiddlenameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridMiddlenameDA = new SqlDataAdapter(refreshDatagridMiddlenameCMD);
                    DataTable refreshDatagridMiddlenameDT = new DataTable("familyMembers");
                    refreshDatagridMiddlenameDA.Fill(refreshDatagridMiddlenameDT);
                    search_dataGrid.ItemsSource = refreshDatagridMiddlenameDT.DefaultView;
                    refreshDatagridMiddlenameDA.Update(refreshDatagridMiddlenameDT);
                    connection.Close();

                    //count middlename total
                    SqlConnection countMiddleNameTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countMiddleNameTotal_connection.Open();
                    SqlCommand countMiddleNameTotalCMD = new SqlCommand();
                    countMiddleNameTotalCMD.Connection = countMiddleNameTotal_connection;
                    countMiddleNameTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countMiddleNameTotalCMD.ExecuteNonQuery();

                    SqlDataReader countMiddleNameTotalDR = countMiddleNameTotalCMD.ExecuteReader();
                    while (countMiddleNameTotalDR.Read())
                    {
                        middlenameTotalCount++;
                    }
                    countMiddleNameTotalDR.Close();
                    countMiddleNameTotal_connection.Close();

                    //count mname
                    SqlConnection countMiddlename_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countMiddlename_connection.Open();
                    SqlCommand countMiddlenameCMD = new SqlCommand();
                    countMiddlenameCMD.Connection = countMiddlename_connection;
                    countMiddlenameCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE middle_name LIKE '%' + @middlename + '%'";
                    countMiddlenameCMD.Parameters.AddWithValue("@middlename", search_textbox_value);
                    countMiddlenameCMD.ExecuteNonQuery();

                    SqlDataReader countMiddlenameDR = countMiddlenameCMD.ExecuteReader();
                    while (countMiddlenameDR.Read())
                    {
                        middlenameCount++;
                    }
                    countMiddlenameDR.Close();
                    countMiddlename_connection.Close();

                    double partialmiddlename = middlenameCount * 100;
                    double totalmiddlename = partialmiddlename / middlenameTotalCount;
                    totalmiddlename = Convert.ToDouble(String.Format("{0:0.00}", totalmiddlename));

                    statistics.Content = "Category: Middle Name" + "          " + "Middle Name: " + search_textbox_value + "          " + "Total Matched Results: " + middlenameCount + "          " + "Total Number of Person: " + middlenameTotalCount + "          " + "Total Percentage of Matched Results: " + totalmiddlename + "%";
                    break;

                case "Last Name":
                    int lastnameCount = 0;
                    int lastnametotalCount = 0;

                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                    }

                    connection.Open();
                    string refreshDatagridLastname = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE last_name LIKE '%' + @lastName + '%'";
                    SqlCommand refreshDatagridLastnameCMD = new SqlCommand(refreshDatagridLastname, connection);
                    refreshDatagridLastnameCMD.Parameters.AddWithValue("@lastName", search_textbox_value);
                    refreshDatagridLastnameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridLastnameDA = new SqlDataAdapter(refreshDatagridLastnameCMD);
                    DataTable refreshDatagridLastnameDT = new DataTable("familyMembers");
                    refreshDatagridLastnameDA.Fill(refreshDatagridLastnameDT);
                    search_dataGrid.ItemsSource = refreshDatagridLastnameDT.DefaultView;
                    refreshDatagridLastnameDA.Update(refreshDatagridLastnameDT);
                    connection.Close();

                    //count middlename total
                    SqlConnection countLastNameTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countLastNameTotal_connection.Open();
                    SqlCommand countLastNameTotalCMD = new SqlCommand();
                    countLastNameTotalCMD.Connection = countLastNameTotal_connection;
                    countLastNameTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countLastNameTotalCMD.ExecuteNonQuery();

                    SqlDataReader countLastNameTotalDR = countLastNameTotalCMD.ExecuteReader();
                    while (countLastNameTotalDR.Read())
                    {
                        lastnametotalCount++;
                    }
                    countLastNameTotalDR.Close();
                    countLastNameTotal_connection.Close();

                    //count lname
                    SqlConnection countLastname_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countLastname_connection.Open();
                    SqlCommand countLastnameCMD = new SqlCommand();
                    countLastnameCMD.Connection = countLastname_connection;
                    countLastnameCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE last_name LIKE '%' + @lastname + '%'";
                    countLastnameCMD.Parameters.AddWithValue("@lastname", search_textbox_value);
                    countLastnameCMD.ExecuteNonQuery();

                    SqlDataReader countLastnameDR = countLastnameCMD.ExecuteReader();
                    while (countLastnameDR.Read())
                    {
                        lastnameCount++;
                    }
                    countLastnameDR.Close();
                    countLastname_connection.Close();

                    double partiallastname = lastnameCount * 100;
                    double totallastname = partiallastname / lastnametotalCount;
                    totallastname = Convert.ToDouble(String.Format("{0:0.00}", totallastname));

                    statistics.Content = "Category: Last Name" + "          " + "Last Name: " + search_textbox_value + "          " + "Total Matched Results: " + lastnameCount + "          " + "Total Number of Person: " + lastnametotalCount + "          " + "Total Percentage of Matched Results: " + totallastname + "%";
                    break;

                case "4Ps":
                    int fourpscount = 0;
                    int totalfourpscount = 0;

                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if(comboboxColumn != 6)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagrid4Ps = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE fourps=@fourps";
                    SqlCommand refreshDatagrid4PsCMD = new SqlCommand(refreshDatagrid4Ps, connection);
                    refreshDatagrid4PsCMD.Parameters.AddWithValue("@fourps", search_combobox_value);
                    refreshDatagrid4PsCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagrid4PsDA = new SqlDataAdapter(refreshDatagrid4PsCMD);
                    DataTable refreshDatagrid4PsDT = new DataTable("familyMembers");
                    refreshDatagrid4PsDA.Fill(refreshDatagrid4PsDT);
                    search_dataGrid.ItemsSource = refreshDatagrid4PsDT.DefaultView;
                    refreshDatagrid4PsDA.Update(refreshDatagrid4PsDT);
                    connection.Close();

                    //count fourps total
                    SqlConnection countFourpsTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countFourpsTotal_connection.Open();
                    SqlCommand countFourpsTotalCMD = new SqlCommand();
                    countFourpsTotalCMD.Connection = countFourpsTotal_connection;
                    countFourpsTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countFourpsTotalCMD.ExecuteNonQuery();

                    SqlDataReader countFourpsTotalDR = countFourpsTotalCMD.ExecuteReader();
                    while (countFourpsTotalDR.Read())
                    {
                        totalfourpscount++;
                    }
                    countFourpsTotalDR.Close();
                    countFourpsTotal_connection.Close();


                    //count fourps
                    SqlConnection countFourps_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countFourps_connection.Open();
                    SqlCommand countFourpsCMD = new SqlCommand();
                    countFourpsCMD.Connection = countFourps_connection;
                    countFourpsCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE fourps=@fourps";
                    countFourpsCMD.Parameters.AddWithValue("@fourps", search_combobox_value);
                    countFourpsCMD.ExecuteNonQuery();

                    SqlDataReader countFourpsDR = countFourpsCMD.ExecuteReader();
                    while (countFourpsDR.Read())
                    {
                        fourpscount++;
                    }
                    countFourpsDR.Close();
                    countFourps_connection.Close();

                    double partialfourps = fourpscount * 100;
                    double totalfourps = partialfourps / totalfourpscount;
                    totalfourps = Convert.ToDouble(String.Format("{0:0.00}", totalfourps));


                    statistics.Content = "Category: 4Ps" + "          " + "4Ps: " + search_combobox_value + "          " + "Total Matched Results: " + fourpscount + "          " + "Total Number of Person: " + totalfourpscount + "          " + "Total Percentage of Matched Results: " + totalfourps + "%";
                    break;

                case "Age":
                    int agecount = 0;
                    int totalagecount = 0;

                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 7)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridAge = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE age=@age";
                    SqlCommand refreshDatagridAgeCMD = new SqlCommand(refreshDatagridAge, connection);
                    refreshDatagridAgeCMD.Parameters.AddWithValue("@age", search_textbox_number_value);
                    refreshDatagridAgeCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridAgeDA = new SqlDataAdapter(refreshDatagridAgeCMD);
                    DataTable refreshDatagridAgeDT = new DataTable("familyMembers");
                    refreshDatagridAgeDA.Fill(refreshDatagridAgeDT);
                    search_dataGrid.ItemsSource = refreshDatagridAgeDT.DefaultView;
                    refreshDatagridAgeDA.Update(refreshDatagridAgeDT);
                    connection.Close();

                    //count age total
                    SqlConnection countAgeTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countAgeTotal_connection.Open();
                    SqlCommand countAgeTotalCMD = new SqlCommand();
                    countAgeTotalCMD.Connection = countAgeTotal_connection;
                    countAgeTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countAgeTotalCMD.ExecuteNonQuery();

                    SqlDataReader countAgeTotalDR = countAgeTotalCMD.ExecuteReader();
                    while (countAgeTotalDR.Read())
                    {
                        totalagecount++;
                    }
                    countAgeTotalDR.Close();
                    countAgeTotal_connection.Close();

                    //count age
                    SqlConnection countAge_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countAge_connection.Open();
                    SqlCommand countAgeCMD = new SqlCommand();
                    countAgeCMD.Connection = countAge_connection;
                    countAgeCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE age=@age";
                    countAgeCMD.Parameters.AddWithValue("@age", search_textbox_number_value);
                    countAgeCMD.ExecuteNonQuery();

                    SqlDataReader countAgeDR = countAgeCMD.ExecuteReader();
                    while (countAgeDR.Read())
                    {
                        agecount++;
                    }
                    countAgeDR.Close();
                    countAge_connection.Close();

                    double partialage = agecount * 100;
                    double totalage = partialage / totalagecount;
                    totalage = Convert.ToDouble(String.Format("{0:0.00}", totalage));


                    statistics.Content = "Category: Age" + "          " + "Age: " + search_textbox_number_value + "          " + "Total Matched Results: " + agecount + "          " + "Total Number of Person: " + totalagecount + "          " + "Total Percentage of Matched Results: " + totalage + "%";

                    break;

                case "Agricultural Facility":
                    int agriculturalfacilitycount = 0;
                    int totalagriculturalfacilitycount = 0;

                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 8)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridAgriculture = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE agricultural_facilities=@agriculturalFacility AND head_or_member='Head'";
                    SqlCommand refreshDatagridAgricultureCMD = new SqlCommand(refreshDatagridAgriculture, connection);
                    refreshDatagridAgricultureCMD.Parameters.AddWithValue("@agriculturalFacility", search_combobox_value);
                    refreshDatagridAgricultureCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridAgricultureDA = new SqlDataAdapter(refreshDatagridAgricultureCMD);
                    DataTable refreshDatagridAgricultureDT = new DataTable("familyMembers");
                    refreshDatagridAgricultureDA.Fill(refreshDatagridAgricultureDT);
                    search_dataGrid.ItemsSource = refreshDatagridAgricultureDT.DefaultView;
                    refreshDatagridAgricultureDA.Update(refreshDatagridAgricultureDT);
                    connection.Close();

                    //count age total
                    SqlConnection countAgriculturalFacilityTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countAgriculturalFacilityTotal_connection.Open();
                    SqlCommand countAgriculturalFacilityTotalCMD = new SqlCommand();
                    countAgriculturalFacilityTotalCMD.Connection = countAgriculturalFacilityTotal_connection;
                    countAgriculturalFacilityTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countAgriculturalFacilityTotalCMD.ExecuteNonQuery();

                    SqlDataReader countAgriculturalFacilityTotalDR = countAgriculturalFacilityTotalCMD.ExecuteReader();
                    while (countAgriculturalFacilityTotalDR.Read())
                    {
                        totalagriculturalfacilitycount++;
                    }
                    countAgriculturalFacilityTotalDR.Close();
                    countAgriculturalFacilityTotal_connection.Close();

                    //count age
                    SqlConnection countAgriculturalFacility_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countAgriculturalFacility_connection.Open();
                    SqlCommand countAgriculturalFacilityCMD = new SqlCommand();
                    countAgriculturalFacilityCMD.Connection = countAgriculturalFacility_connection;
                    countAgriculturalFacilityCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE agricultural_facilities=@agrifacility AND head_or_member='Head'";
                    countAgriculturalFacilityCMD.Parameters.AddWithValue("@agrifacility", search_combobox_value);
                    countAgriculturalFacilityCMD.ExecuteNonQuery();

                    SqlDataReader countAgriculturalFacilityDR = countAgriculturalFacilityCMD.ExecuteReader();
                    while (countAgriculturalFacilityDR.Read())
                    {
                        agriculturalfacilitycount++;
                    }
                    countAgriculturalFacilityDR.Close();
                    countAgriculturalFacility_connection.Close();

                    double partialAgriculturalFacility = agriculturalfacilitycount * 100;
                    double totalAgriculturalFacility = partialAgriculturalFacility / totalagriculturalfacilitycount;
                    totalAgriculturalFacility = Convert.ToDouble(String.Format("{0:0.00}", totalAgriculturalFacility));


                    statistics.Content = "Category: Agricultural Facility" + "          " + "Agricultural Facility: " + search_combobox_value + "          " + "Total Matched Results: " + agriculturalfacilitycount + "          " + "Total Number of Household: " + totalagriculturalfacilitycount + "          " + "Total Percentage of Matched Results: " + totalAgriculturalFacility + "%";

                    break;

                case "Animals/Pet":
                    int animalcount = 0;
                    int totalanimalcount = 0;

                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 9)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridAnimals = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE animals=@animals AND head_or_member='Head'";
                    SqlCommand refreshDatagridAnimalsCMD = new SqlCommand(refreshDatagridAnimals, connection);
                    refreshDatagridAnimalsCMD.Parameters.AddWithValue("@animals", search_combobox_value);
                    refreshDatagridAnimalsCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridAnimalsDA = new SqlDataAdapter(refreshDatagridAnimalsCMD);
                    DataTable refreshDatagridAnimalsDT = new DataTable("familyMembers");
                    refreshDatagridAnimalsDA.Fill(refreshDatagridAnimalsDT);
                    search_dataGrid.ItemsSource = refreshDatagridAnimalsDT.DefaultView;
                    refreshDatagridAnimalsDA.Update(refreshDatagridAnimalsDT);
                    connection.Close();

                    //count animals total
                    SqlConnection countAnimalTotal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countAnimalTotal_connection.Open();
                    SqlCommand countAnimalTotalCMD = new SqlCommand();
                    countAnimalTotalCMD.Connection = countAnimalTotal_connection;
                    countAnimalTotalCMD.CommandText = "SELECT * FROM familyMembers";
                    countAnimalTotalCMD.ExecuteNonQuery();

                    SqlDataReader countAnimalTotalDR = countAnimalTotalCMD.ExecuteReader();
                    while (countAnimalTotalDR.Read())
                    {
                        totalanimalcount++;
                    }
                    countAnimalTotalDR.Close();
                    countAnimalTotal_connection.Close();

                    //count animals
                    SqlConnection countAnimal_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    countAnimal_connection.Open();
                    SqlCommand countAnimalCMD = new SqlCommand();
                    countAnimalCMD.Connection = countAnimal_connection;
                    countAnimalCMD.CommandText = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE animals=@animals AND head_or_member='Head'";
                    countAnimalCMD.Parameters.AddWithValue("@animals", search_combobox_value);
                    countAnimalCMD.ExecuteNonQuery();

                    SqlDataReader countAnimalDR = countAnimalCMD.ExecuteReader();
                    while (countAnimalDR.Read())
                    {
                        animalcount++;
                    }
                    countAnimalDR.Close();
                    countAnimal_connection.Close();

                    double partialAnimal = animalcount * 100;
                    double totalAnimal = partialAnimal / totalanimalcount;
                    totalAnimal = Convert.ToDouble(String.Format("{0:0.00}", totalAnimal));


                    statistics.Content = "Category: Animal/Pet" + "          " + "Animal/Pet: " + search_combobox_value + "          " + "Total Matched Results: " + animalcount + "          " + "Total Number of Household: " + totalanimalcount + "          " + "Total Percentage of Matched Results: " + totalAnimal + "%";

                    break;

                case "Background Gardening":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 10)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridBackgroundGardening = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE background_gardening=@backgroundGardening AND head_or_member='Head'";
                    SqlCommand refreshDatagridBackgroundGardeningCMD = new SqlCommand(refreshDatagridBackgroundGardening, connection);
                    refreshDatagridBackgroundGardeningCMD.Parameters.AddWithValue("@backgroundGardening", search_combobox_value);
                    refreshDatagridBackgroundGardeningCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridBackgroundGardeningDA = new SqlDataAdapter(refreshDatagridBackgroundGardeningCMD);
                    DataTable refreshDatagridBackgroundGardeningDT = new DataTable("familyMembers");
                    refreshDatagridBackgroundGardeningDA.Fill(refreshDatagridBackgroundGardeningDT);
                    search_dataGrid.ItemsSource = refreshDatagridBackgroundGardeningDT.DefaultView;
                    refreshDatagridBackgroundGardeningDA.Update(refreshDatagridBackgroundGardeningDT);
                    connection.Close();
                    break;

                case "Birth Date":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 11)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridBdate = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE bdate=@bdate";
                    SqlCommand refreshDatagridBdateCMD = new SqlCommand(refreshDatagridBdate, connection);
                    refreshDatagridBdateCMD.Parameters.AddWithValue("@bdate", search_textbox_date_value);
                    refreshDatagridBdateCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridBdateDA = new SqlDataAdapter(refreshDatagridBdateCMD);
                    DataTable refreshDatagridBdateDT = new DataTable("familyMembers");
                    refreshDatagridBdateDA.Fill(refreshDatagridBdateDT);
                    search_dataGrid.ItemsSource = refreshDatagridBdateDT.DefaultView;
                    refreshDatagridBdateDA.Update(refreshDatagridBdateDT);
                    connection.Close();
                    break;

                case "Blind Drainage":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 12)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridBlindDrainage = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE blind_drainage=@blindDrainage WHERE head_or_member = 'Head'";
                    SqlCommand refreshDatagridBlindDrainageCMD = new SqlCommand(refreshDatagridBlindDrainage, connection);
                    refreshDatagridBlindDrainageCMD.Parameters.AddWithValue("@blindDrainage", search_combobox_value);
                    refreshDatagridBlindDrainageCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridBlindDrainageDA = new SqlDataAdapter(refreshDatagridBlindDrainageCMD);
                    DataTable refreshDatagridBlindDrainageDT = new DataTable("familyMembers");
                    refreshDatagridBlindDrainageDA.Fill(refreshDatagridBlindDrainageDT);
                    search_dataGrid.ItemsSource = refreshDatagridBlindDrainageDT.DefaultView;
                    refreshDatagridBlindDrainageDA.Update(refreshDatagridBlindDrainageDT);
                    connection.Close();
                    break;

                case "Breast Feeding":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 13)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridBreastFeeding = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE breast_feeding=@breastFeeding";
                    SqlCommand refreshDatagridBreastFeedingCMD = new SqlCommand(refreshDatagridBreastFeeding, connection);
                    refreshDatagridBreastFeedingCMD.Parameters.AddWithValue("@breastFeeding", search_combobox_value);
                    refreshDatagridBreastFeedingCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridBreastFeedingDA = new SqlDataAdapter(refreshDatagridBreastFeedingCMD);
                    DataTable refreshDatagridBreastFeedingDT = new DataTable("familyMembers");
                    refreshDatagridBreastFeedingDA.Fill(refreshDatagridBreastFeedingDT);
                    search_dataGrid.ItemsSource = refreshDatagridBreastFeedingDT.DefaultView;
                    refreshDatagridBreastFeedingDA.Update(refreshDatagridBreastFeedingDT);
                    connection.Close();
                    break;

                case "Communication":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 14)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridCommunication = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE communication LIKE '%' + @communication + '%' AND head_or_member='Head'";
                    SqlCommand refreshDatagridCommunicationCMD = new SqlCommand(refreshDatagridCommunication, connection);
                    refreshDatagridCommunicationCMD.Parameters.AddWithValue("@communication", search_textbox_value);
                    refreshDatagridCommunicationCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridCommunicationDA = new SqlDataAdapter(refreshDatagridCommunicationCMD);
                    DataTable refreshDatagridCommunicationDT = new DataTable("familyMembers");
                    refreshDatagridCommunicationDA.Fill(refreshDatagridCommunicationDT);
                    search_dataGrid.ItemsSource = refreshDatagridCommunicationDT.DefaultView;
                    refreshDatagridCommunicationDA.Update(refreshDatagridCommunicationDT);
                    connection.Close();
                    break;

                case "Dependency":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 15)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridDependency = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE dependency=@dependency";
                    SqlCommand refreshDatagridDependencyCMD = new SqlCommand(refreshDatagridDependency, connection);
                    refreshDatagridDependencyCMD.Parameters.AddWithValue("@dependency", search_combobox_value);
                    refreshDatagridDependencyCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridDependencyDA = new SqlDataAdapter(refreshDatagridDependencyCMD);
                    DataTable refreshDatagridDependencyDT = new DataTable("familyMembers");
                    refreshDatagridDependencyDA.Fill(refreshDatagridDependencyDT);
                    search_dataGrid.ItemsSource = refreshDatagridDependencyDT.DefaultView;
                    refreshDatagridDependencyDA.Update(refreshDatagridDependencyDT);
                    connection.Close();
                    break;

                case "Direct Waste to Water Bodies":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 16)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagriddwtwb = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE direct_waste_to_water_bodies=@dwtwb AND head_or_member='Head'";
                    SqlCommand refreshDatagriddwtwbCMD = new SqlCommand(refreshDatagriddwtwb, connection);
                    refreshDatagriddwtwbCMD.Parameters.AddWithValue("@dwtwb", search_combobox_value);
                    refreshDatagriddwtwbCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagriddwtwbDA = new SqlDataAdapter(refreshDatagriddwtwbCMD);
                    DataTable refreshDatagriddwtwbDT = new DataTable("familyMembers");
                    refreshDatagriddwtwbDA.Fill(refreshDatagriddwtwbDT);
                    search_dataGrid.ItemsSource = refreshDatagriddwtwbDT.DefaultView;
                    refreshDatagriddwtwbDA.Update(refreshDatagriddwtwbDT);
                    connection.Close();
                    break;

                case "Energy Source":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 17)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridEnergySource = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE energy_source LIKE '%' + @energySource + '%' AND head_or_member='Head'";
                    SqlCommand refreshDatagridEnergySourceCMD = new SqlCommand(refreshDatagridEnergySource, connection);
                    refreshDatagridEnergySourceCMD.Parameters.AddWithValue("@energySource", search_textbox_value);
                    refreshDatagridEnergySourceCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridEnergySourceDA = new SqlDataAdapter(refreshDatagridEnergySourceCMD);
                    DataTable refreshDatagridEnergySourceDT = new DataTable("familyMembers");
                    refreshDatagridEnergySourceDA.Fill(refreshDatagridEnergySourceDT);
                    search_dataGrid.ItemsSource = refreshDatagridEnergySourceDT.DefaultView;
                    refreshDatagridEnergySourceDA.Update(refreshDatagridEnergySourceDT);
                    connection.Close();
                    break;

                case "Family Planning":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 18)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridFamilyPlanning = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_planning=@familyPlanning AND head_or_member='Head'";
                    SqlCommand refreshDatagridFamilyPlanningCMD = new SqlCommand(refreshDatagridFamilyPlanning, connection);
                    refreshDatagridFamilyPlanningCMD.Parameters.AddWithValue("@familyPlanning", search_combobox_value);
                    refreshDatagridFamilyPlanningCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridFamilyPlanningDA = new SqlDataAdapter(refreshDatagridFamilyPlanningCMD);
                    DataTable refreshDatagridFamilyPlanningDT = new DataTable("familyMembers");
                    refreshDatagridFamilyPlanningDA.Fill(refreshDatagridFamilyPlanningDT);
                    search_dataGrid.ItemsSource = refreshDatagridFamilyPlanningDT.DefaultView;
                    refreshDatagridFamilyPlanningDA.Update(refreshDatagridFamilyPlanningDT);
                    connection.Close();
                    break;

                case "Farming Product":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 33)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridProductName = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id INNER JOIN farmingProducts ON farmingProducts.product_household_id = household.household_id WHERE product_name=@productName AND head_or_member='Head'";
                    SqlCommand refreshDatagridProductNameCMD = new SqlCommand(refreshDatagridProductName, connection);
                    refreshDatagridProductNameCMD.Parameters.AddWithValue("@productName", search_textbox_value);
                    refreshDatagridProductNameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridProductNameDA = new SqlDataAdapter(refreshDatagridProductNameCMD);
                    DataTable refreshDatagridProductNameDT = new DataTable("familyMembers");
                    refreshDatagridProductNameDA.Fill(refreshDatagridProductNameDT);
                    search_dataGrid.ItemsSource = refreshDatagridProductNameDT.DefaultView;
                    refreshDatagridProductNameDA.Update(refreshDatagridProductNameDT);
                    connection.Close();
                    break;

                case "Garbage Disposal":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 19)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridGarbageDisposal = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE garbage_disposal=@garbageDisposal AND head_or_member='Head'";
                    SqlCommand refreshDatagridGarbageDisposalCMD = new SqlCommand(refreshDatagridGarbageDisposal, connection);
                    refreshDatagridGarbageDisposalCMD.Parameters.AddWithValue("@garbageDisposal", search_combobox_value);
                    refreshDatagridGarbageDisposalCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridGarbageDisposalDA = new SqlDataAdapter(refreshDatagridGarbageDisposalCMD);
                    DataTable refreshDatagridGarbageDisposalDT = new DataTable("familyMembers");
                    refreshDatagridGarbageDisposalDA.Fill(refreshDatagridGarbageDisposalDT);
                    search_dataGrid.ItemsSource = refreshDatagridGarbageDisposalDT.DefaultView;
                    refreshDatagridGarbageDisposalDA.Update(refreshDatagridGarbageDisposalDT);
                    connection.Close();
                    break;

                case "Highest Educational Attainment":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 20)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridEducation = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE education=@education";
                    SqlCommand refreshDatagridEducationCMD = new SqlCommand(refreshDatagridEducation, connection);
                    refreshDatagridEducationCMD.Parameters.AddWithValue("@education", search_combobox_value);
                    refreshDatagridEducationCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridEducationDA = new SqlDataAdapter(refreshDatagridEducationCMD);
                    DataTable refreshDatagridEducationDT = new DataTable("familyMembers");
                    refreshDatagridEducationDA.Fill(refreshDatagridEducationDT);
                    search_dataGrid.ItemsSource = refreshDatagridEducationDT.DefaultView;
                    refreshDatagridEducationDA.Update(refreshDatagridEducationDT);
                    connection.Close();
                    break;

                case "Homelot Status":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 21)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridHomelotStatus = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE homelot_status=@homelotStatus AND head_or_member = 'Head'";
                    SqlCommand refreshDatagridHomelotStatusCMD = new SqlCommand(refreshDatagridHomelotStatus, connection);
                    refreshDatagridHomelotStatusCMD.Parameters.AddWithValue("@homelotStatus", search_combobox_value);
                    refreshDatagridHomelotStatusCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridHomelotStatusDA = new SqlDataAdapter(refreshDatagridHomelotStatusCMD);
                    DataTable refreshDatagridHomelotStatusDT = new DataTable("familyMembers");
                    refreshDatagridHomelotStatusDA.Fill(refreshDatagridHomelotStatusDT);
                    search_dataGrid.ItemsSource = refreshDatagridHomelotStatusDT.DefaultView;
                    refreshDatagridHomelotStatusDA.Update(refreshDatagridHomelotStatusDT);
                    connection.Close();
                    break;

                case "House Status":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 22)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridHouseStatus = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE house_status=@houseStatus AND head_or_member = 'Head'";
                    SqlCommand refreshDatagridHouseStatusCMD = new SqlCommand(refreshDatagridHouseStatus, connection);
                    refreshDatagridHouseStatusCMD.Parameters.AddWithValue("@houseStatus", search_combobox_value);
                    refreshDatagridHouseStatusCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridHouseStatusDA = new SqlDataAdapter(refreshDatagridHouseStatusCMD);
                    DataTable refreshDatagridHouseStatusDT = new DataTable("familyMembers");
                    refreshDatagridHouseStatusDA.Fill(refreshDatagridHouseStatusDT);
                    search_dataGrid.ItemsSource = refreshDatagridHouseStatusDT.DefaultView;
                    refreshDatagridHouseStatusDA.Update(refreshDatagridHouseStatusDT);
                    connection.Close();
                    break;

                case "House Type":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 23)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridHouseType = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE house_type=@houseType AND head_or_member = 'Head'";
                    SqlCommand refreshDatagridHouseTypeCMD = new SqlCommand(refreshDatagridHouseType, connection);
                    refreshDatagridHouseTypeCMD.Parameters.AddWithValue("@houseType", search_combobox_value);
                    refreshDatagridHouseTypeCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridHouseTypeDA = new SqlDataAdapter(refreshDatagridHouseTypeCMD);
                    DataTable refreshDatagridHouseTypeDT = new DataTable("familyMembers");
                    refreshDatagridHouseTypeDA.Fill(refreshDatagridHouseTypeDT);
                    search_dataGrid.ItemsSource = refreshDatagridHouseTypeDT.DefaultView;
                    refreshDatagridHouseTypeDA.Update(refreshDatagridHouseTypeDT);
                    connection.Close();
                    break;

                case "Immunization":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 24)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridImmunization = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE immunization=@immunization AND head_or_member = 'Head'";
                    SqlCommand refreshDatagridImmunizationCMD = new SqlCommand(refreshDatagridImmunization, connection);
                    refreshDatagridImmunizationCMD.Parameters.AddWithValue("@immunization", search_combobox_value);
                    refreshDatagridImmunizationCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridImmunizationDA = new SqlDataAdapter(refreshDatagridImmunizationCMD);
                    DataTable refreshDatagridImmunizationDT = new DataTable("familyMembers");
                    refreshDatagridImmunizationDA.Fill(refreshDatagridImmunizationDT);
                    search_dataGrid.ItemsSource = refreshDatagridImmunizationDT.DefaultView;
                    refreshDatagridImmunizationDA.Update(refreshDatagridImmunizationDT);
                    connection.Close();
                    break;

                case "IP":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 25)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridIP = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE ip=@ip";
                    SqlCommand refreshDatagridIPCMD = new SqlCommand(refreshDatagridIP, connection);
                    refreshDatagridIPCMD.Parameters.AddWithValue("@ip", search_combobox_value);
                    refreshDatagridIPCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridIPDA = new SqlDataAdapter(refreshDatagridIPCMD);
                    DataTable refreshDatagridIPDT = new DataTable("familyMembers");
                    refreshDatagridIPDA.Fill(refreshDatagridIPDT);
                    search_dataGrid.ItemsSource = refreshDatagridIPDT.DefaultView;
                    refreshDatagridIPDA.Update(refreshDatagridIPDT);
                    connection.Close();
                    break;

                case "Livelihood Status":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 26)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridLivelihoodStatus = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE livelihood_status LIKE '%' + @livelihoodStatus + '%' AND head_or_member='Head'";
                    SqlCommand refreshDatagridLivelihoodStatusCMD = new SqlCommand(refreshDatagridLivelihoodStatus, connection);
                    refreshDatagridLivelihoodStatusCMD.Parameters.AddWithValue("@livelihoodStatus", search_textbox_value);
                    refreshDatagridLivelihoodStatusCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridLivelihoodStatusDA = new SqlDataAdapter(refreshDatagridLivelihoodStatusCMD);
                    DataTable refreshDatagridLivelihoodStatusDT = new DataTable("familyMembers");
                    refreshDatagridLivelihoodStatusDA.Fill(refreshDatagridLivelihoodStatusDT);
                    search_dataGrid.ItemsSource = refreshDatagridLivelihoodStatusDT.DefaultView;
                    refreshDatagridLivelihoodStatusDA.Update(refreshDatagridLivelihoodStatusDT);
                    connection.Close();
                    break;

                case "Mother Tongue":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 27)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridMotherTongue = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE mother_tongue=@motherTongue AND head_or_member='Head'";
                    SqlCommand refreshDatagridMotherTongueCMD = new SqlCommand(refreshDatagridMotherTongue, connection);
                    refreshDatagridMotherTongueCMD.Parameters.AddWithValue("@motherTongue", search_combobox_value);
                    refreshDatagridMotherTongueCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridMotherTongueDA = new SqlDataAdapter(refreshDatagridMotherTongueCMD);
                    DataTable refreshDatagridMotherTongueDT = new DataTable("familyMembers");
                    refreshDatagridMotherTongueDA.Fill(refreshDatagridMotherTongueDT);
                    search_dataGrid.ItemsSource = refreshDatagridMotherTongueDT.DefaultView;
                    refreshDatagridMotherTongueDA.Update(refreshDatagridMotherTongueDT);
                    connection.Close();
                    break;

                case "NTP":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 28)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridntp = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE ntp=@ntp";
                    SqlCommand refreshDatagridntpCMD = new SqlCommand(refreshDatagridntp, connection);
                    refreshDatagridntpCMD.Parameters.AddWithValue("@ntp", search_combobox_value);
                    refreshDatagridntpCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridntpDA = new SqlDataAdapter(refreshDatagridntpCMD);
                    DataTable refreshDatagridntpDT = new DataTable("familyMembers");
                    refreshDatagridntpDA.Fill(refreshDatagridntpDT);
                    search_dataGrid.ItemsSource = refreshDatagridntpDT.DefaultView;
                    refreshDatagridntpDA.Update(refreshDatagridntpDT);
                    connection.Close();
                    break;

                case "Number of Family Members":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 29)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridFamnum = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE family_number=@famnum AND head_or_member='Head'";
                    SqlCommand refreshDatagridFamnumCMD = new SqlCommand(refreshDatagridFamnum, connection);
                    refreshDatagridFamnumCMD.Parameters.AddWithValue("@famnum", search_textbox_number_value);
                    refreshDatagridFamnumCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridFamnumDA = new SqlDataAdapter(refreshDatagridFamnumCMD);
                    DataTable refreshDatagridFamnumDT = new DataTable("familyMembers");
                    refreshDatagridFamnumDA.Fill(refreshDatagridFamnumDT);
                    search_dataGrid.ItemsSource = refreshDatagridFamnumDT.DefaultView;
                    refreshDatagridFamnumDA.Update(refreshDatagridFamnumDT);
                    connection.Close();
                    break;

                case "Occupation":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 30)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridOccupation = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE occupation LIKE '%' + @occupation + '%' AND head_or_member='Head'";
                    SqlCommand refreshDatagridOccupationCMD = new SqlCommand(refreshDatagridOccupation, connection);
                    refreshDatagridOccupationCMD.Parameters.AddWithValue("@occupation", search_textbox_value);
                    refreshDatagridOccupationCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridOccupationDA = new SqlDataAdapter(refreshDatagridOccupationCMD);
                    DataTable refreshDatagridOccupationDT = new DataTable("familyMembers");
                    refreshDatagridOccupationDA.Fill(refreshDatagridOccupationDT);
                    search_dataGrid.ItemsSource = refreshDatagridOccupationDT.DefaultView;
                    refreshDatagridOccupationDA.Update(refreshDatagridOccupationDT);
                    connection.Close();
                    break;

                case "Other Source of Income":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 31)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridOtherSourceOfIncome = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE other_source_of_income LIKE '%' + @otherSourceOfIncome + '%' AND head_or_member='Head'";
                    SqlCommand refreshDatagridOtherSourceOfIncomeCMD = new SqlCommand(refreshDatagridOtherSourceOfIncome, connection);
                    refreshDatagridOtherSourceOfIncomeCMD.Parameters.AddWithValue("@otherSourceOfIncome", search_textbox_value);
                    refreshDatagridOtherSourceOfIncomeCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridOtherSourceOfIncomeDA = new SqlDataAdapter(refreshDatagridOtherSourceOfIncomeCMD);
                    DataTable refreshDatagridOtherSourceOfIncomeDT = new DataTable("familyMembers");
                    refreshDatagridOtherSourceOfIncomeDA.Fill(refreshDatagridOtherSourceOfIncomeDT);
                    search_dataGrid.ItemsSource = refreshDatagridOtherSourceOfIncomeDT.DefaultView;
                    refreshDatagridOtherSourceOfIncomeDA.Update(refreshDatagridOtherSourceOfIncomeDT);
                    connection.Close();
                    break;

                case "Philhealth":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 32)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridPhilhealth = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE philhealth=@philhealth";
                    SqlCommand refreshDatagridPhilhealthCMD = new SqlCommand(refreshDatagridPhilhealth, connection);
                    refreshDatagridPhilhealthCMD.Parameters.AddWithValue("@philhealth", search_combobox_value);
                    refreshDatagridPhilhealthCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridPhilhealthDA = new SqlDataAdapter(refreshDatagridPhilhealthCMD);
                    DataTable refreshDatagridPhilhealthDT = new DataTable("familyMembers");
                    refreshDatagridPhilhealthDA.Fill(refreshDatagridPhilhealthDT);
                    search_dataGrid.ItemsSource = refreshDatagridPhilhealthDT.DefaultView;
                    refreshDatagridPhilhealthDA.Update(refreshDatagridPhilhealthDT);
                    connection.Close();
                    break;

                case "PWD":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 34)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridpwd = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE pwd=@pwd";
                    SqlCommand refreshDatagridpwdCMD = new SqlCommand(refreshDatagridpwd, connection);
                    refreshDatagridpwdCMD.Parameters.AddWithValue("@pwd", search_combobox_value);
                    refreshDatagridpwdCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridpwdDA = new SqlDataAdapter(refreshDatagridpwdCMD);
                    DataTable refreshDatagridpwdDT = new DataTable("familyMembers");
                    refreshDatagridpwdDA.Fill(refreshDatagridpwdDT);
                    search_dataGrid.ItemsSource = refreshDatagridpwdDT.DefaultView;
                    refreshDatagridpwdDA.Update(refreshDatagridpwdDT);
                    connection.Close();
                    break;

                case "Relation to Head of the Family":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 35)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridRelationship = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE relationship=@relationship";
                    SqlCommand refreshDatagridRelationshipCMD = new SqlCommand(refreshDatagridRelationship, connection);
                    refreshDatagridRelationshipCMD.Parameters.AddWithValue("@relationship", search_combobox_value);
                    refreshDatagridRelationshipCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridRelationshipDA = new SqlDataAdapter(refreshDatagridRelationshipCMD);
                    DataTable refreshDatagridRelationshipDT = new DataTable("familyMembers");
                    refreshDatagridRelationshipDA.Fill(refreshDatagridRelationshipDT);
                    search_dataGrid.ItemsSource = refreshDatagridRelationshipDT.DefaultView;
                    refreshDatagridRelationshipDA.Update(refreshDatagridRelationshipDT);
                    connection.Close();
                    break;

                case "Religion":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 36)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridReligion = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE religion=@religion";
                    SqlCommand refreshDatagridReligionCMD = new SqlCommand(refreshDatagridReligion, connection);
                    refreshDatagridReligionCMD.Parameters.AddWithValue("@religion", search_combobox_value);
                    refreshDatagridReligionCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridReligionDA = new SqlDataAdapter(refreshDatagridReligionCMD);
                    DataTable refreshDatagridReligionDT = new DataTable("familyMembers");
                    refreshDatagridReligionDA.Fill(refreshDatagridReligionDT);
                    search_dataGrid.ItemsSource = refreshDatagridReligionDT.DefaultView;
                    refreshDatagridReligionDA.Update(refreshDatagridReligionDT);
                    connection.Close();
                    break;

                case "Sanitary Toilet":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 37)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridSanitaryToilet = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE sanitary_toilet=@sanitaryToilet AND head_or_member='Head'";
                    SqlCommand refreshDatagridSanitaryToiletCMD = new SqlCommand(refreshDatagridSanitaryToilet, connection);
                    refreshDatagridSanitaryToiletCMD.Parameters.AddWithValue("@sanitaryToilet", search_combobox_value);
                    refreshDatagridSanitaryToiletCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridSanitaryToiletDA = new SqlDataAdapter(refreshDatagridSanitaryToiletCMD);
                    DataTable refreshDatagridSanitaryToiletDT = new DataTable("familyMembers");
                    refreshDatagridSanitaryToiletDA.Fill(refreshDatagridSanitaryToiletDT);
                    search_dataGrid.ItemsSource = refreshDatagridSanitaryToiletDT.DefaultView;
                    refreshDatagridSanitaryToiletDA.Update(refreshDatagridSanitaryToiletDT);
                    connection.Close();
                    break;

                case "Sex":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                    }

                    connection.Open();
                    string refreshDatagridSex = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE sex=@sex";
                    SqlCommand refreshDatagridSexCMD = new SqlCommand(refreshDatagridSex, connection);
                    refreshDatagridSexCMD.Parameters.AddWithValue("@sex", search_combobox_value);
                    refreshDatagridSexCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridSexDA = new SqlDataAdapter(refreshDatagridSexCMD);
                    DataTable refreshDatagridSexDT = new DataTable("familyMembers");
                    refreshDatagridSexDA.Fill(refreshDatagridSexDT);
                    search_dataGrid.ItemsSource = refreshDatagridSexDT.DefaultView;
                    refreshDatagridSexDA.Update(refreshDatagridSexDT);
                    connection.Close();
                    break;

                case "Smooking":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 38)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridSmooking = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE smooking=@smooking";
                    SqlCommand refreshDatagridSmookingCMD = new SqlCommand(refreshDatagridSmooking, connection);
                    refreshDatagridSmookingCMD.Parameters.AddWithValue("@smooking", search_combobox_value);
                    refreshDatagridSmookingCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridSmookingDA = new SqlDataAdapter(refreshDatagridSmookingCMD);
                    DataTable refreshDatagridSmookingDT = new DataTable("familyMembers");
                    refreshDatagridSmookingDA.Fill(refreshDatagridSmookingDT);
                    search_dataGrid.ItemsSource = refreshDatagridSmookingDT.DefaultView;
                    refreshDatagridSmookingDA.Update(refreshDatagridSmookingDT);
                    connection.Close();
                    break;

                case "Suffix":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 39)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridSuffix = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE suffix=@suffix";
                    SqlCommand refreshDatagridSuffixCMD = new SqlCommand(refreshDatagridSuffix, connection);
                    refreshDatagridSuffixCMD.Parameters.AddWithValue("@suffix", search_combobox_value);
                    refreshDatagridSuffixCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridSuffixDA = new SqlDataAdapter(refreshDatagridSuffixCMD);
                    DataTable refreshDatagridSuffixDT = new DataTable("familyMembers");
                    refreshDatagridSuffixDA.Fill(refreshDatagridSuffixDT);
                    search_dataGrid.ItemsSource = refreshDatagridSuffixDT.DefaultView;
                    refreshDatagridSuffixDA.Update(refreshDatagridSuffixDT);
                    connection.Close();
                    break;

                case "Transportation":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 40)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridTransportation = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE transportation LIKE '%' + @transportation + '%' AND head_or_member = 'Head'";
                    SqlCommand refreshDatagridTransportationCMD = new SqlCommand(refreshDatagridTransportation, connection);
                    refreshDatagridTransportationCMD.Parameters.AddWithValue("@transportation", search_textbox_value);
                    refreshDatagridTransportationCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridTransportationDA = new SqlDataAdapter(refreshDatagridTransportationCMD);
                    DataTable refreshDatagridTransportationDT = new DataTable("familyMembers");
                    refreshDatagridTransportationDA.Fill(refreshDatagridTransportationDT);
                    search_dataGrid.ItemsSource = refreshDatagridTransportationDT.DefaultView;
                    refreshDatagridTransportationDA.Update(refreshDatagridTransportationDT);
                    connection.Close();
                    break;

                case "Tribe":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 41)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridTribe = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE tribe=@tribe";
                    SqlCommand refreshDatagridTribeCMD = new SqlCommand(refreshDatagridTribe, connection);
                    refreshDatagridTribeCMD.Parameters.AddWithValue("@tribe", search_combobox_value);
                    refreshDatagridTribeCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridTribeDA = new SqlDataAdapter(refreshDatagridTribeCMD);
                    DataTable refreshDatagridTribeDT = new DataTable("familyMembers");
                    refreshDatagridTribeDA.Fill(refreshDatagridTribeDT);
                    search_dataGrid.ItemsSource = refreshDatagridTribeDT.DefaultView;
                    refreshDatagridTribeDA.Update(refreshDatagridTribeDT);
                    connection.Close();
                    break;

                case "Vulnerable Status":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 42)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridVulnerableStatus = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE vulnerable_status LIKE '%' + @vulnerableStatus + '%' AND head_or_member = 'Head'";
                    SqlCommand refreshDatagridVulnerableStatusCMD = new SqlCommand(refreshDatagridVulnerableStatus, connection);
                    refreshDatagridVulnerableStatusCMD.Parameters.AddWithValue("@vulnerableStatus", search_textbox_value);
                    refreshDatagridVulnerableStatusCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridVulnerableStatusDA = new SqlDataAdapter(refreshDatagridVulnerableStatusCMD);
                    DataTable refreshDatagridVulnerableStatusDT = new DataTable("familyMembers");
                    refreshDatagridVulnerableStatusDA.Fill(refreshDatagridVulnerableStatusDT);
                    search_dataGrid.ItemsSource = refreshDatagridVulnerableStatusDT.DefaultView;
                    refreshDatagridVulnerableStatusDA.Update(refreshDatagridVulnerableStatusDT);
                    connection.Close();
                    break;

                case "Water Source":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 43)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridWaterSource = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE water_source=@waterSource AND head_or_member = 'Head'";
                    SqlCommand refreshDatagridWaterSourceCMD = new SqlCommand(refreshDatagridWaterSource, connection);
                    refreshDatagridWaterSourceCMD.Parameters.AddWithValue("@waterSource", search_combobox_value);
                    refreshDatagridWaterSourceCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridWaterSourceDA = new SqlDataAdapter(refreshDatagridWaterSourceCMD);
                    DataTable refreshDatagridWaterSourceDT = new DataTable("familyMembers");
                    refreshDatagridWaterSourceDA.Fill(refreshDatagridWaterSourceDT);
                    search_dataGrid.ItemsSource = refreshDatagridWaterSourceDT.DefaultView;
                    refreshDatagridWaterSourceDA.Update(refreshDatagridWaterSourceDT);
                    connection.Close();
                    break;

                case "WRA":
                    for (var comboboxColumn = 6; comboboxColumn < 45; comboboxColumn++)
                    {
                        if (comboboxColumn != 44)
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Hidden;
                        }

                        else
                        {
                            search_dataGrid.Columns[comboboxColumn].Visibility = Visibility.Visible;
                        }
                    }

                    connection.Open();
                    string refreshDatagridwra = "SELECT * FROM familyMembers INNER JOIN household ON familyMembers.family_member_household_id = household.household_id WHERE wra=@wra AND head_or_member = 'Head'";
                    SqlCommand refreshDatagridwraCMD = new SqlCommand(refreshDatagridwra, connection);
                    refreshDatagridwraCMD.Parameters.AddWithValue("@wra", search_combobox_value);
                    refreshDatagridwraCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridwraDA = new SqlDataAdapter(refreshDatagridwraCMD);
                    DataTable refreshDatagridwraDT = new DataTable("familyMembers");
                    refreshDatagridwraDA.Fill(refreshDatagridwraDT);
                    search_dataGrid.ItemsSource = refreshDatagridwraDT.DefaultView;
                    refreshDatagridwraDA.Update(refreshDatagridwraDT);
                    connection.Close();
                    break;


                default:
                    break;
            }
        }
    }
}
