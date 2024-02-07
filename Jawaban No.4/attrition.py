import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns

# Read the data into a DataFrame
data = pd.read_csv("HR-Employee-Attrition.csv")

# Summary Statistics
summary_stats = data.describe()

# 1. Attrition Distribution
plt.figure(figsize=(8, 6))
sns.countplot(x='Attrition', data=data)
plt.title('Attrition Distribution')
plt.xlabel('Attrition')
plt.ylabel('Count')
plt.show()

# 2. Age Distribution by Attrition
plt.figure(figsize=(10, 6))
sns.boxplot(x='Attrition', y='Age', data=data)
plt.title('Age Distribution by Attrition')
plt.xlabel('Attrition')
plt.ylabel('Age')
plt.show()

# 3. Monthly Income Distribution by Department
plt.figure(figsize=(10, 6))
sns.boxplot(x='Department', y='MonthlyIncome', data=data)
plt.title('Monthly Income Distribution by Department')
plt.xlabel('Department')
plt.ylabel('Monthly Income')
plt.show()

# 4. Job Satisfaction Distribution
plt.figure(figsize=(8, 6))
sns.histplot(data['JobSatisfaction'], bins=4, kde=True)
plt.title('Job Satisfaction Distribution')
plt.xlabel('Job Satisfaction')
plt.ylabel('Count')
plt.show()

# 5. Gender Distribution
plt.figure(figsize=(8, 6))
sns.countplot(x='Gender', data=data)
plt.title('Gender Distribution')
plt.xlabel('Gender')
plt.ylabel('Count')
plt.show()

print("Script finished")
